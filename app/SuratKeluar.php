<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';

    protected $fillable = [
        'no_indeks', 'nomor', 'tgl_surat', 'perihal', 'dari', 'kepada', 'keterangan', 'media', 'sifat_surat', 'penerima'
    ];
}
