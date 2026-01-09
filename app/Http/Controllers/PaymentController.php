<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Exports\LaporanPendapatanExport; 
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
         $keyword = $request->search;

        $totalOmzet = Payments::where('status', 'success')->sum('amount');
    $totalTransaksi = Payments::count();
    $transaksiSukses = Payments::where('status', 'success')->count();
        $payment = Payments::with('membership.member.user')
            ->where('status', 'success')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {

                    $q->where('order_id', 'like', "%{$keyword}%")
                      ->orWhereHas('membership.member.user', function ($u) use ($keyword) {
                          $u->where('name', 'like', "%{$keyword}%");
                      });

                });
            })
            ->latest()
            ->paginate(10);
        return view('payment.index',compact('payment','totalOmzet','totalTransaksi','transaksiSukses'));
    
}
public function exportExcel(Request $request)
{
    
    $bulan = $request->input('bulan', date('m'));
    $tahun = $request->input('tahun', date('Y'));

    // Nama file saat didownload nanti
    $namaFile = 'Laporan-Pendapatan-' . $bulan . '-' . $tahun . '.xlsx';

    // Download file excel
    return Excel::download(new LaporanPendapatanExport($bulan, $tahun), $namaFile);
}
}
