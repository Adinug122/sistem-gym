<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['member_id','checkin_time','gym_id'];

    public function gym()
{
    return $this->belongsTo(Gym::class);
}

public function member()
{
    return $this->belongsTo(Member::class);
}


}
