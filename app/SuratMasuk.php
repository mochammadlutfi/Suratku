<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{

    protected $table = 'surat_masuk';

    protected $fillable = [
        'no_indeks', 'nomor', 'tgl_surat', 'perihal', 'dari', 'kepada', 'keterangan', 'media', 'sifat_surat'
    ];


    public function files()
    {
        return $this->hasMany('App\FileMasuk', 'masuk_id', 'id');
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
        return $this->hasOne('Spatie\Permission\Models\Role', 'id', 'kepada');
    }

}
