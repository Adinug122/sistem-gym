<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProgramLatihan extends Model
{
    protected $fillable = ['nama_program','description'];


    public function pilihProgram(){
        return $this->hasMany(PilihProgram::class);
    }
}
