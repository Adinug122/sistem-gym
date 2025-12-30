<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gym extends Model
{
    protected $fillable = ['name','location','qr_code'];

    public function absensi()
{
    return $this->hasMany(Absensi::class);
}

}
