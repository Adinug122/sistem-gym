<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\booking; // Pastikan Model diawali huruf Besar (Standar Laravel)
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(){
        $user = Auth::user();
        $trainer = $user->trainer;
        $programId = $trainer->program->pluck('id');
        $namaHariIni = Carbon::now()->locale('id')->translatedFormat('l');
        $class = Jadwal::with(['program','bookings'])->
            whereIn('program_id',$programId)
                            ->where('hari',$namaHariIni)
                            ->orderBy('jam_mulai','asc')
                            ->get();

        $member = $user->member;
     
        $classHariIni = $class->count();
       $classIds = $class->pluck('id');  
        $totalPeserta = booking::whereIn('jadwal_id',$classIds)
                        ->count();
     
    return view('trainer',compact('classHariIni','totalPeserta','class'));
                        


    }

    public function store(Request $request ){
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id' 
        ]);

        $jadwal = Jadwal::findOrFail($request->jadwal_id);
        
        // 1. Ambil Memb er dari User yg Login
        $user = Auth::user();
        $member = $user->member; 

        // 2. CEK SAFETY: Kalau user login tapi belum punya data member
        if(!$member) {
            return back()->with('error', 'Profil member tidak ditemukan. Harap lengkapi pendaftaran member dulu.');
        }

  
        $sudahDaftar = booking::where('member_id', $member->id)
            ->where('jadwal_id', $jadwal->id)
            ->exists();

        if($sudahDaftar){
            return back()->with('error', 'Kamu sudah terdaftar di kelas ini');
        }

        // 4. Cek Kuota
        $totalPeserta = booking::where('jadwal_id', $jadwal->id)->count();
        if($totalPeserta >= $jadwal->kuota_maksimal){
            return back()->with('error', 'Yah, kuota kelas ini sudah penuh');
        }

        $sudahBayar = Membership::where('member_id',$member->id)
                      ->where('status','active')
                      ->exists();

         if(!$sudahBayar){
            return back()->with('error','Kamu belum berlangganan membership');
         }

        // 5. Simpan Booking 
        Booking::create([
            'jadwal_id'    => $jadwal->id,
            'member_id'    => $member->id,
            'kode_booking' => 'BK-'. strtoupper(Str::random(6)),
        ]);

        // 6. Update Status
        if($totalPeserta + 1 >= $jadwal->kuota_maksimal){
            $jadwal->update(['status' => 'full']);
        }

        return redirect()->route('dashboard.user')->with('success', 'Berhasil Booking');
    }

    public function destroy($id){
        $booking = booking::findOrFail($id);
        $user = Auth::user();
        $isTrainerPemilik = false;
        $isMemberYangPunya = ($booking->user_id == $user->id);
    if ($user->role === 'trainer' && $user->trainer) {
        $isTrainerPemilik = ($booking->jadwal->program->trainer_id == $user->trainer->id);
    }

    if (!$isMemberYangPunya && !$isTrainerPemilik) {
        abort(403, 'Anda tidak berhak menghapus data ini.');
    }

    $jadwal = $booking->jadwal;
    $booking->delete();
    if ($jadwal->status == 'full') {
        $jadwal->update(['status' => 'active']);
    }

  
    if ($isTrainerPemilik) {
        return back()->with('success', 'Member berhasil diabsen (Check-in).');
    } else {
        return back()->with('success', 'Booking berhasil dibatalkan.');
    }
    }


}                       