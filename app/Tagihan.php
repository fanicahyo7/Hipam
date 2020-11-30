<?php

namespace App;

use App\Traits\CompositeKey;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use CompositeKey;
    protected $primaryKey = ['id_tagihan','id_user','bulan','tahun'];
    protected $fillable = [
        'id_tagihan', 'id_user', 'bulan', 'tahun', 
        'metersekarang', 'metersebelumnya', 'pakai',
        'tarif1', 'totaltarif1', 'tarif2', 'totaltarif2',
        'abonemen', 'kompensasi', 'rekeningpakaiair',
        'denda', 'totaltagihan', 'status',
        'user_entry', 'user_update', 'user_delete'
    ];

    public function tagihanuserrelasi(){
        return $this->hasOne(User::class,'id','id_user');
    }
}
