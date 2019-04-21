<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';

    protected $fillable = [
        'surat_id', 'sifat', 'catatan', 'ttd_kasubbag', 'ttd_sekretaris', 'ttd_kaban', 'status'
    ];



    public function tujuan()
    {
        return $this->hasMany('App\TujuanDisposisi', 'disposisi_id', 'id');
    }
}
