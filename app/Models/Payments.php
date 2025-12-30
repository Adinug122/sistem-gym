<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
 
    protected $fillable = ['membership_id','order_id','amount','payment_type','transaction_status','transaction_id'
               ,'status' ,'paid_at','snap_token','raw_response'];
    public function membership()
{
    return $this->belongsTo(Membership::class);
}
}
