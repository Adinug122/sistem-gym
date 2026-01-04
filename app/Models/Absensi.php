<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table ='absensi';
    protected $fillable = ['member_id','checkin_time',];


public function member()
{
    return $this->belongsTo(Member::class);
}


}
