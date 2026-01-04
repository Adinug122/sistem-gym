<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgramLatihan;
use App\Models\trainer;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = trainer::where('user_id',Auth::id())->firstOrFail();
        $program = ProgramLatihan::where('trainer_id',$trainer->id)->pluck('id');
        $jadwal = Jadwal::with('program')
        ->whereIn('program_id',$program)    
        ->get();

        return view('jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainer = trainer::where('user_id',Auth::id())->firstOrFail();
        $programs = ProgramLatihan::with('trainer')
        ->where('trainer_id',$trainer->id)
        ->get();
     return view('jadwal.create',compact('programs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'program_id' => 'required|exists:program_latihan,id',
        'hari' => 'required|',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|after:jam_mulai',
    ]);

    Jadwal::create($request->all());

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat!');
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
        $jadwal = Jadwal::findOrFail($id);
         $trainer = trainer::where('user_id',Auth::id())->firstOrFail();
        $programs = ProgramLatihan::with('trainer')
        ->where('trainer_id',$trainer->id)
        ->get();
        return view('jadwal.edit',compact('jadwal','programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        
   $jadwal->update($request->all());

    return redirect()->route('jadwal.index')->with('success', 'Jadwal diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();


        return redirect()->route('jadwal.index')->with('success','jadwal berhasil dihapus');
    }
}
