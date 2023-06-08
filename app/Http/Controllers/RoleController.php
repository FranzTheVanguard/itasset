<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {   
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        return view('role.create');
    }

    public function store(Request $request)
    {   
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        $validatedData = $request->validate([
            'nama_role' => 'required',
        ]);

        Role::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        return view('role.show', compact('role'));
    }

    public function destroy(Role $role)
    {   
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}