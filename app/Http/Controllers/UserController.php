<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    
    public function index()
    {
        $users = User::with('divisi', 'role')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        $roles = Role::all();
        $divisis = Divisi::all();
        return view('user.create', compact('roles', 'divisis'));
    }

    public function store(Request $request)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'divisi_id' => 'required',
            'password' => 'required',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('users.index')->with(['success' => 'User Berhasil disimpan!']);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        $user->delete();
        
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'User Berhasil Dihapus!']);
    }
}
