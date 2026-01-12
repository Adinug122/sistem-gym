<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['hari','jam_mulai','jam_selesai','program_id','kuota_maksimal','ruangan','status'];

    public function program(){
        return $this->belongsTo(ProgramLatihan::class);
    }
 public function bookings()
{
    return $this->hasMany(Booking::class);
}
   
}
