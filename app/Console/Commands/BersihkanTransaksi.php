<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Membership;
use Carbon\Carbon;

class BersihkanTransaksi extends Command
{
    // 1. Nama perintah buat dipanggil robot
    protected $signature = 'transaksi:bersihkan';

    // 2. Deskripsi perintah
    protected $description = 'Menghapus transaksi membership yang pending lebih dari 1 jam';

    public function handle()
    {
        // LOGIKA PENGHAPUSAN:
        // Cari status 'nonactive' DAN dibuat lebih dari 60 menit yang lalu
        $batasWaktu = Carbon::now()->subMinutes(5);

        $sampah = Membership::where('status', 'nonactive')
                    ->where('created_at', '<', $batasWaktu)
                    ->get(); // Ambil dulu datanya buat dihitung

        $jumlah = $sampah->count();

        if ($jumlah > 0) {
            // Hapus Payment terkait dulu (kalau tidak pakai onDelete cascade di database)
            // Membership::whereIn('id', $sampah->pluck('id'))->delete(); 
            
            // Atau kalau sudah cascade, langsung hapus membershipnya:
            Membership::where('status', 'nonactive')
                ->where('created_at', '<', $batasWaktu)
                ->delete();
            
            $this->info("Berhasil membersihkan {$jumlah} transaksi gantung.");
        } else {
            $this->info("Tidak ada sampah ditemukan.");
        }
    }
}