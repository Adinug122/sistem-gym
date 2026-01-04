<?php

namespace App\Http\Controllers;

use App\Models\ProgramLatihan;
use App\Models\trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProgramLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = trainer::where('user_id', Auth::id())->firstOrFail();

        $program = ProgramLatihan::with('trainer')
        ->where('trainer_id',$trainer->id)
        ->get();
        return view('program.index',compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'desciption' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('program','public');
        }
$user = Auth::user();
        
        ProgramLatihan::create([
            'nama' => $request->nama,
            'trainer_id'   => $user->trainer->id,
            'desciption' => $request->desciption,
            'image' => $imagePath
        ]);

        return redirect()->route('program.index')->with('success','Program berhasil ditambahkan');

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
        $program = ProgramLatihan::findOrFail($id);

        return view('program.edit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = ProgramLatihan::findOrFail($id);
           $request->validate([
            'nama' => 'nullable|string|max:255',
            'desciption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
        'nama' => $request->nama,
        'desciption'  => $request->desciption,
       
    ];
        if($request->hasFile('image')){

            if($program->image && Storage::disk('public')->exists($program->image)){
                Storage::disk('public')->delete($program->image);
            }
          $data['image'] = $request->file('image')->store('program','public');
        }

        $program->update($data);
    
        return redirect()->route('program.index')->with('success','Program berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = ProgramLatihan::findOrFail($id);

        $program->delete();

        return redirect()->route('program.index')->with('success','Program berhasil dihapus');
    }
}
