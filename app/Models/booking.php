<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'member_id',
       'jadwal_id',
       'kode_booking',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }


}
