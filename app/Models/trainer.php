<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

    protected $table = 'trainer';

    protected $fillable = ['user_id','status','specialis'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function program(){
        return $this->hasMany(ProgramLatihan::class);
    }
   
    
}
