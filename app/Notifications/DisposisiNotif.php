<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DisposisiNotif extends Notification
{
    use Queueable;
    public $disposisi;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($disposisi)
    {
        $this->disposisi = $disposisi;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'surat_id' => $this->disposisi->surat_id,
            'sifat' => $this->disposisi->sifat,
            'catatan' => $this->disposisi->catatan,
            'status' => $this->disposisi->status,
            'tgl_disposisi' => $this->disposisi->tgl_disposisi,
        ];
    }
}
