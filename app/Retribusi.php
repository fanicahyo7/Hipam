<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retribusi extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'retribusi_name', 'id_rw', 'tarif1', 'tarif2', 'abonemen', 'kompensasi',
        'user_entry', 'user_update', 'user_delete'
    ];
}
