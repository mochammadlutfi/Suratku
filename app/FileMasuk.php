<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileMasuk extends Model
{
    protected $table = 'files_masuk';

    protected $fillable = [
        'masuk_id', 'path'
    ];
}
