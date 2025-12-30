<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['start','end','status','pilih_progr_id'];

    public function pilihProgram(){
        return $this->belongsTo(PilihProgram::class);
    }
}
