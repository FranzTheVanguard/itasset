<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $users = User::all();
        $items = Stock::where('qty', '>',0)->get();
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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $item = Stock::find($request->input('item'));
        if($request->amount > $item->qty) return redirect()->route('peminjamans.create')->with(['error' => 'Jumlah pinjaman terlalu banyak!']);
        $peminjaman = Peminjaman::create([
            'user_id' => $request->user,
            'item_id' => $request->item,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keterangan_peminjaman' => $request->keterangan_peminjaman,
            'amount' => $request->amount,
        ]);
        $item->qty = $item->qty - $request->amount;
        $item->save();
        Laporan::create([
            'item_id' => $peminjaman->id,
            'item_type' => 'Peminjaman',
        ]);
        //redirect to index
        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Peminjaman $peminjaman)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $users = User::all();
        $items = Stock::where('qty', '>',0)->get();
        // $items->prepend($peminjaman->stock);
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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'user',
            'tanggal_pinjam',
            'tanggal_pengembalian',
        ]);
        //update 
        $peminjaman->stock->qty = $peminjaman->stock->qty + $peminjaman->amount - $request->amount;
        $peminjaman->stock->save();
        $peminjaman->update([
            'user_id' => $request->user,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keterangan_peminjaman' => $request->keterangan_peminjaman,
            'amount' => $request->amount,
        ]);
        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index
    public function destroy(Peminjaman $peminjaman)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        if($peminjaman->pengembalian->laporan) $peminjaman->pengembalian->laporan->delete();
        if($peminjaman->pengembalian) $peminjaman->pengembalian->delete();
        if($peminjaman->laporan) $peminjaman->laporan->delete();
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('peminjamans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
