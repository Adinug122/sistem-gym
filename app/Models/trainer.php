<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{

    protected $table = 'trainer';

    protected $fillable = ['user_id','status','specialis'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function program(){
        return $this->hasMany(ProgramLatihan::class);
    }
       public function pilihProgram(){
        return $this->hasMany(PilihProgram::class);
    }
}
