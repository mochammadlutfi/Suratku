<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class SuratKeluarBaruNotification extends Notification
{
    use Queueable;

    protected $suratKeluar;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($suratKeluar)
    {
        $this->surat = $suratKeluar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->surat->id,
            'indeks' => $this->surat->no_indeks,
            'perihal' => $this->surat->perihal,
            'keterangan'=> $this->surat->keterangan,
            'kepada' => $this->surat->kepada,
            'tgl_terima' => $this->surat->created_at
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->surat->id,
            'indeks' => $this->surat->no_indeks,
            'perihal' => $this->surat->perihal,
            'keterangan'=> $this->surat->keterangan,
            'kepada' => $this->surat->kepada,
            'tgl_terima' => $this->surat->created_at
        ]);
    }

}
