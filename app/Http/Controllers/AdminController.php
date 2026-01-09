<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use App\Models\Member;
use App\Models\Payments;
use App\Models\trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $memberAktif = Member::where('status','active')->count();
        $Totalmember = Member::count();
        $Totaltrainer = trainer::count();
        $AbsenHariIni = Absensi::whereDate('checkin_time',Carbon::today())->count();   

        $dataPendapatan = Payments::join('membership', 'payments.membership_id', '=', 'membership.id')
                        ->join('paket','membership.paket_id','=','paket.id')
                        ->where('payments.status','success')
                        ->whereMonth('payments.created_at', Carbon::now()->month) 
                        ->whereYear('payments.created_at', Carbon::now()->year)
                        ->select('paket.nama as nama_paket',DB::raw('SUM(payments.amount) as total_pendapatan'))
                        ->groupBy('paket.nama')
                        ->get();

        $donutLabels = $dataPendapatan->pluck('nama_paket');
        $donutData = $dataPendapatan->pluck('total_pendapatan');

        $listAbsen = Absensi::with(['member.user','member.membership.paket'])
        ->whereDate('checkin_time',Carbon::now())
        ->latest()
        ->take(3)
        ->get();    
$chartMemberLabels = [];
    $chartMemberData = [];

    // Loop dari 5 (5 bulan lalu) sampai 0 (bulan ini)
    for ($i = 5; $i >= 0; $i--) {
        // Ambil tanggal mundur
        $date = Carbon::now()->subMonths($i);
        
        // 1. Buat Label Bulan (Jan, Feb, Mar...)
        // 'M' = Short month name (Jan, Feb). 'F' = Full name (January)
        $chartMemberLabels[] = $date->translatedFormat('M'); 

     
        $jumlahMember = Member::whereYear('created_at', $date->year)
                              ->whereMonth('created_at', $date->month)
                              ->count();
        
        $chartMemberData[] = $jumlahMember;
    }
      
    
        return view('dashboard',compact('memberAktif',
        'Totalmember','Totaltrainer','AbsenHariIni',
        'dataPendapatan','donutData','donutLabels','listAbsen','chartMemberLabels', 
        'chartMemberData'));
    }
}
