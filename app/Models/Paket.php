<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{

    protected $table = 'paket';
    protected $fillable = ['nama'
    ,'deskripsi'
    ,'durasi_angka','durasi_satuan'
    ,'harga','benefits'];

    protected $casts = [
        'benefits' => 'array', 
    ];

    public function membership(){
        return $this->hasMany(Membership::class);
    }
}
