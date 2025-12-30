<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $paket = Paket::all();

        return view('welcome',compact('paket'));
    }

    public function dashboard(){
    $user = Auth()->user();
    $member = Member::where('user_id',$user->id)->firstOrFail();

    $membership = Membership::with('paket')->where( 'member_id',$member->id)->latest()
    ->firstOrFail();
    
 

  $end = Carbon::parse($membership->end)->translatedFormat('d F Y');

$sisa = Carbon::now()->diffInDays($membership->end, false);

$sisa_asli = (int) ceil($sisa);
return view('hai',compact('membership','end','sisa_asli'));
    }

    public function handle(){
        Membership::where('status','active')
        ->where('end','<',now())
        ->update(['status'=>'expired']);

        Membership::where('status','schedule')
        ->where('end','<=',now())
        ->update(['status'=>'active']);
    }    
}
