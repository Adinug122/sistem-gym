<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $fillable = ['member_id','paket_id','start','end','status'];


    public function payments()
{
    return $this->hasMany(Payments::class);
}

public function paket(){
    return $this->belongsTo(Paket::class);
}

public function Member(){
    return $this->belongsTo(Member::class);
}

}
