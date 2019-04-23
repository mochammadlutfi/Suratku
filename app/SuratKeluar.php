<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';

    protected $fillable = [
        'no_indeks', 'nomor', 'tgl_surat', 'perihal', 'dari', 'kepada', 'keterangan', 'media', 'sifat_surat', 'penerima'
    ];

    public function Keluar(){
        return $this->hasMany('App\FileKeluar', 'keluar_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'kepada', 'id');
    }

    public function disposisi()
    {
        return $this->hasOne('App\Disposisi', 'surat_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('Spatie\Permission\Models\Role', 'id', 'dari');
    }
}
