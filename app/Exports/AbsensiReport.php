<?php
namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbsensiReport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    
protected $bulan;
protected $tahun;

public function __construct($bulan,$tahun)
{
    $this->bulan = $bulan;
    $this->tahun = $tahun;
}

    public function collection()
    {
        return Absensi::with(['member.user'])
        ->whereMonth('created_at',$this->bulan)
        ->whereYear('created_at',$this->tahun)
        ->get();
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama Member',
            'Tanggal',
            'Jam Masuk'
        ];
    }

   public function map($absen): array{
        static $no = 0;
        $no++;

        return[
            $no,
            $absen->member->user->name ?? 'Member tidak ada',
            $absen->created_at->translatedFormat('D Y M'),
            $absen->created_at->format('H:i:s'),
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Baris header dibuat tebal
            1 => ['font' => ['bold' => true]],
        ];
    }
}
