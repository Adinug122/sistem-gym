<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $member = Member::all();
        return view('member.index',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string|unique:member,phone',
            'status' => 'required|in:active,nonactive'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt(Str::random(10)),
            'email' => $request->email,
            'role' => 'member'
        ]);

         Member::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        Password::sendResetLink(['email' => $user->email]);

        return redirect()->route('admin.member.index')->with('success','Member Succes Ditambah');
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
        $member = Member::findOrFail($id);
        return view('member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $member = Member::with('user')->findOrFail($id);
         $user = $member->user;
      $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',Rule::unique('users','email')->ignore($user->id),
            'phone' => 'required|string|unique:member,phone',
        ]);

    
    $member->user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    $member->update([
        'phone' => $request->phone
    ]);

        return redirect()->route('admin.member.index')->with('success','data member Succes Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        
        $member->user()->delete();
        $member->delete();

        return redirect()->route("admin.member.index")->with("success","data berhasil dihapus");
    }
}
