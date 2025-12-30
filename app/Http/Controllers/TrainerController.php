<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trainer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = Trainer::all();

        return view('trainer.index',compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'specialis' => 'required|string',
            'status' => 'required|in:active,nonactive'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'trainer',
            'password' => bcrypt(Str::random('10'))
        ]);

        Trainer::create([
            'user_id' => $user->id,
            'specialis' => $request->specialis,
            'status' => $request->status,
        ]);

        Password::sendResetLink(['email' => $user->email]);
        return redirect()->route('admin.trainer.index')->with("success",'Trainer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trainer = trainer::findOrFail($id);
        return view('trainer.edit',compact("trainer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $trainer = Trainer::with("user")->findOrFail($id);
        $user = $trainer->user;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',Rule::unique('users','email')->ignore($user->id),
            'specialis' => 'required|string',
            'status' => 'required|in:active,nonactive',
        ]);

        $trainer->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $trainer->update([
            'user_id' => $user->id,
            'specialis' => $request->specialis,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.trainer.index')->with("success",'Trainer berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainer::findOrFail($id);

        $trainer->user->delete();
        $trainer->delete();

        return redirect()->route('admin.trainer.index')->with("success",'Data berhasil dihapus');
    }
}
