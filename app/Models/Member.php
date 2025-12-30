<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['user_id','status','phone',];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pilihProgram(){
        return $this->hasMany(PilihProgram::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }
    public function membership(){
        return $this->hasMany(Membership::class);
    }
}
