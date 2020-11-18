<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable = [
        'rw_name', 'id_retribution', 'user_entry', 'user_update', 'user_delete'
    ];
}
