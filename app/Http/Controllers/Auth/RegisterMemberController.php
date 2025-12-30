<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterMemberController extends Controller
{

   public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required|string|unique:member,phone',
            'status' => 'required|in:active,nonactive'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => 'member'
        ]);

         Member::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);


             event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login')->with('success','Anda Berhasil Login ');
    }
}
