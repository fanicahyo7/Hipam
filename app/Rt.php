<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rt extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'rt_name', 'id_rw', 'user_entry', 'user_update', 'user_delete'
    ];

    public function rtrwrelasi(){
        return $this->hasOne(Rw::class,'id','id_rw');
    }
}
