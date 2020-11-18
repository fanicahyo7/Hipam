<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    protected $fillable = [
        'retribusi_name', 'id_rw', 'tarif1', 'tarif2', 'abonemen', 'kompensasi',
        'user_entry', 'user_update', 'user_delete'
    ];
}
