<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $fillable = [
        'acara', 'tgl_awal','tgl_akhir', 'warna',
    ];


}
