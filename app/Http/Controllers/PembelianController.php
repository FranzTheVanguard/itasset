<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        $pembelians = Pembelian::all();


        return view('pembelians.index', compact('pembelians'));
    }
    public function create()
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        return view('pembelians.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        Pembelian::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'jenis' => $request->jenis,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        //redirect to index
        return redirect()->route('pembelians.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Pembelian $pembelian)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        return view('pembelians.edit', compact('pembelian'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //validate form
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'nama_vendor',
            'alamat_vendor',
            'jenis',
            'tanggal_pembelian',

        ]);


        //update 
        $pembelian->update([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'jenis' => $request->jenis,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        return redirect()->route('pembelians.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index

    public function destroy(Pembelian $pembelian)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        $pembelian->delete();

        //redirect to index
        return redirect()->route('pembelians.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
