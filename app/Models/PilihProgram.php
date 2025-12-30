<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihProgram extends Model
{
    protected $table = 'pilih_program';

    protected $fillable = [
        'member_id',
        'program_id',
        'trainer_id',
        'status',
        'catatan',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function program()
    {
        return $this->belongsTo(ProgramLatihan::class, 'program_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
