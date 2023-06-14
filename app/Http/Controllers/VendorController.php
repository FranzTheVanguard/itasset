<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        $vendors = Vendor::all();


        return view('vendors.index', compact('vendors'));
    }
    public function create()
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        return view('vendors.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'jenis' => $request->jenis,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        //redirect to index
        return redirect()->route('vendors.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Vendor $vendor)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Vendor $vendor)
    {
        //validate form
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'nama_vendor',
            'alamat_vendor',
            'jenis',
            'tanggal_pembelian',

        ]);


        //update 
        $vendor->update([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'jenis' => $request->jenis,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        return redirect()->route('vendors.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index

    public function destroy(Vendor $vendor)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        $vendor->delete();

        //redirect to index
        return redirect()->route('vendors.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
