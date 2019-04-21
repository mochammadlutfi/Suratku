<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TujuanDisposisi extends Model
{
    protected $table = 'tujuan_disposisi';

    protected $fillable = [
        'disposisi_id', 'role_id'
    ];
}
