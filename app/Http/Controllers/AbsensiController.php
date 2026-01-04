<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Absensi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        // 1. Cari Member & Validasi biar gak crash
        $member = Member::find($request->qrcode);

        if (!$member) {
            return response()->json(['success' => false, 'message' => 'QR Code Tidak Valid / Member Tidak Ditemukan']);
        }

        // 2. AMBIL NAMA (PENGAMAN WAJIB!)
     
        $namaMember = $member->user ? $member->user->name : 'Member ID: ' . $member->id;

        // 3. Cek Membership
        $paketAktif = Membership::where('member_id', $member->id)
            ->whereIn('status', ['schedule', 'active'])
            ->where('end', '>=', now())
            ->exists();

        if (!$paketAktif) {
            return response()->json(['success' => false, 'message' => 'Membership belum aktif / expired']);
        }

        // 4. Cek Absen Harian
        $sudahAbsen = Absensi::where('member_id', $member->id)
            ->whereDate('checkin_time', now())
            ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'success' => false, 
                'message' => 'Member sudah absen hari ini',
                'nama_member' => $namaMember
            ]);
        }

        // 5. SIMPAN KE DATABASE 
        try {
            Absensi::create([
                'member_id'    => $member->id,
                'checkin_time' => now(),
              
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Database Error: ' . $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true, 
            'message' => 'Berhasil Checkin', 
            'nama_member' => $namaMember
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
