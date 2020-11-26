<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rw extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'rw_name', 'id_retribusi', 'user_entry', 'user_update', 'user_delete'
    ];

    public function rwretribusirelasi(){
        return $this->hasOne(Retribusi::class,'id','id_retribusi');
    }
}
