<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {   
        $divisis = Divisi::all();
        return view('divisi.index', compact('divisis'));
    }

    public function create()
    {
        return view('divisi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required',
        ]);
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        Divisi::create($validatedData);

        return redirect()->route('divisions.index')->with('success', 'Divisi created successfully.');
    }

    public function show(Divisi $divisi)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        return view('divisi.show', compact('divisi'));
    }

    public function destroy($divisi)
    {   
        /** @var User|null $user */
        $user = auth()->user();
        if(!$user->isAdmin()) abort(403, 'unauthorized');
        Divisi::find($divisi)->delete();
        return redirect()->route('divisions.index')->with('success', 'Divisi deleted successfully.');
    }
}