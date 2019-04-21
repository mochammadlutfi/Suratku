<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileKeluar extends Model
{
    protected $table = 'files_keluar';

    protected $fillable = [
        'keluar_id', 'path'
    ];
}
