<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['hari','jam_mulai','jam_selesai','program_id'];

    public function program(){
        return $this->belongsTo(ProgramLatihan::class);
    }
}
