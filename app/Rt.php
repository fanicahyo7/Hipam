<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $fillable = [
        'rt_name', 'id_rw', 'user_entry', 'user_update', 'user_delete'
    ];
}
