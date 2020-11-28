<?php

namespace App;

use App\Traits\CompositeKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rt extends Model
{
    use CompositeKey;
    use SoftDeletes;
    protected $primaryKey = ['id_rt','id_rw'];
    protected $fillable = [
        'id_rt', 'id_rw', 'user_entry', 'user_update', 'user_delete'
    ];

    public function rtrwrelasi(){
        return $this->hasOne(Rw::class,'id_rw','id_rw');
    }
}
