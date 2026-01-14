<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trainer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Storage;
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
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,nonactive'
        ]);

        $image = null;

        if($request->hasFile('avatar')){
         $image = $request->file('avatar')->store('avatar','public');   
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'trainer',
            'avatar' => $image,
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
        $trainer = Trainer::findOrFail($id);
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
         'name'      => 'required|string|max:255',
        'email'     => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
        'specialis' => 'required|string',
        'status'    => 'required|in:active,nonactive',
       'avatar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $userData = [
             'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->hasFile('avatar')){
            if($trainer->user->avatar && Storage::disk('public')->exists($trainer->user->avatar)){
                Storage::disk('public')->delete($trainer->user->avatar);
              
            }
            
             $userData['avatar'] =  $request->file('avatar')->store('avatar','public');
        } 
        $trainer->user()->update($userData);

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
