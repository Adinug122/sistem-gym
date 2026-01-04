<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProgramLatihan extends Model
{
    protected $table = 'program_latihan';
    protected $fillable = ['nama','desciption','image','trainer_id'];


    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
    public function trainer()
{
  
    return $this->belongsTo(trainer::class, 'trainer_id');
}
}
