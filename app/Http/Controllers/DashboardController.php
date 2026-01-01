<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index(){
        $paket = Paket::all();

        return view('welcome',compact('paket'));
    }

    public function dashboard(){
    $user = Auth()->user();
    $member = Member::where('user_id',$user->id)->firstOrFail();

        $membership = Membership::with('paket')->where( 'member_id',$member->id)
        ->whereIn('status',['active','schedule','expired'])
        ->orderBy('start','asc')
        ->get();

        $namaPaket = 'Tidak Ada Paket';
        $end = '-';
        $sisaHari = 0;
        $totalPaket = 0;
        $finalDate = 'tidak ada';
        $status =  'none';

        if($membership->isNotEmpty()){
            $current = $membership->first(function($item){
                return now() >= $item->start && now() <= $item->end;
            });

            if($current){
                $status = 'active';
                $namaPaket = $current->paket->nama;
                $finalDate = $membership->max('end');            
            }else {
                $status = 'expired';
                $finalDate = $membership->max('end');
            }

            $end = Carbon::parse($finalDate)->translatedFormat('d M Y');
          
            $sisaHari = (int) ceil(Carbon::now()->diffInDays(Carbon::parse($finalDate),false));

        $totalPaket = $membership->whereIn('status',['active','schedule'])->count();

    }
    $test = QrCode::size(200)->generate(Auth::user()->member->id);
        
 

return view('hai',compact(
    'membership','namaPaket',
    'finalDate','end','sisaHari','totalPaket'
    ,'status','test'));
    }


}
