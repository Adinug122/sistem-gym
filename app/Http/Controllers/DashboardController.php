<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Membership;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\ProgramLatihan;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Trainer;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index(){
        $paket = Paket::latest()->limit(3)->get();
            $program = ProgramLatihan::all();
       $jadwal = Jadwal::with('program')->latest()->limit(6)->get();
        $trainer = Trainer::with('user')->latest()->limit(4)->get();

        return view('welcome',compact('paket','program','jadwal','trainer'));
    }
public function daftarJadwal(){
        $program = ProgramLatihan::all();
     $jadwal = Jadwal::with('program')->latest()->get();

     return view('daftarJadwal',compact('jadwal'));
}
public function daftarPaket(){
       $paket = Paket::latest()->limit(3)->get();

     return view('daftarPaket',compact('paket'));
}

public function daftarTrainer(){
      $trainer = Trainer::with('user')->get();

      return view('trainer',compact('trainer'));
}
    public function dashboard(){
    $user = Auth::user();
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



    public function jadwal(){
        $user = Auth::user();

        $booking = Booking::with('jadwal.program','jadwal.program.trainer.user')
            ->where('member_id' ,$user->member->id)
            ->orderBy('created_at','desc')
            ->get();

        return view('jadwalUser',compact('booking'));
    }

}
