<?php

namespace App\Exports;

use App\Models\Payments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanPendapatanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $bulan;
    protected $tahun;

    // Terima input bulan & tahun dari Controller
    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    // 1. AMBIL DATA DARI DATABASE
    public function collection()
    {
        return Payments::with(['membership.member.user', 'membership.paket'])
            ->where('status', 'success') // Hanya yang sudah bayar
            ->whereMonth('created_at', $this->bulan) // Filter Bulan
            ->whereYear('created_at', $this->tahun)  // Filter Tahun
            ->get();
    }

    // 2. JUDUL KOLOM (HEADER)
    public function headings(): array
    {
        return [
            'No',
            'Tanggal Transaksi',
            'Order ID',
            'Nama Member',
            'Paket Membership',
            'Nominal (Rp)',
        ];
    }

    // 3. ISIKAN DATA KE KOLOM
    public function map($payment): array
    {
       
        static $no = 0;
        $no++;

        return [
            $no,
            $payment->created_at->format('d-m-Y H:i'), // Format: 07-01-2026 10:00
            $payment->order_id,
            $payment->membership->member->user->name ?? 'User Terhapus',
            $payment->membership->paket->nama ?? '-',
            $payment->amount,
        ];
    }

 
    public function styles(Worksheet $sheet)
    {
        return [
            // Baris 1 (Header) dibikin Bold
            1 => ['font' => ['bold' => true]],
        ];
    }
}