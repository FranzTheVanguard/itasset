<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        $peminjamans = Peminjaman::with('user', 'stock')->get();
        return view('peminjamans.index', compact('peminjamans'));
    }
    public function create()
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $users = User::all();
        $items = Stock::where('dipinjam', 'N')->get();
        return view('peminjamans.create', compact('users', 'items'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        // dd($request);exit;
        //create post
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $item = Stock::find($request->input('item'));
        Peminjaman::create([
            'user_id' => $request->user,
            'item_id' => $request->item,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keterangan_peminjaman' => $request->keterangan_peminjaman,
            'serial_number' => $item->serial_number,
            'status' => 'Dipinjam',
        ]);
        $item->dipinjam = 'Y';
        $item->save();
        //redirect to index
        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Peminjaman $peminjaman)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $users = User::all();
        $items = Stock::where('dipinjam', 'N')->get();
        $items->prepend($peminjaman->stock);
        return view('peminjamans.edit', compact('peminjaman', 'users', 'items'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //validate form
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'user',
            'tanggal_pinjam',
            'tanggal_pengembalian',
            'item',
        ]);
        $peminjaman->stock->dipinjam = 'N';
        $peminjaman->stock->save();
        //update 
        $peminjaman->update([
            'user_id' => $request->user,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keterangan_peminjaman' => $request->keterangan_peminjaman,
            'item_id' => $request->item,
        ]);
        $peminjaman->stock->dipinjam = 'Y';
        $peminjaman->stock->save();


        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index
    public function destroy(Peminjaman $peminjaman)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}