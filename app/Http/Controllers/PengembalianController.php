<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Exports\pengembaliansExport;
use App\Models\Laporan;
use App\Models\Peminjaman;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {

        $pengembalians = Pengembalian::with('peminjaman')->get();
        //render view with posts
        return view('pengembalians.index', compact('pengembalians'));
    }

    public function create()
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $users = User::all();
        $peminjamans = Peminjaman::with('stock')->whereDoesntHave('pengembalian')->get();
        return view('pengembalians.create', compact('users', 'peminjamans'));
    }
    public function show()
    {
        echo "pengembalian";
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
        // dd($peminjaman);
        $pengembalian = Pengembalian::create([
            'peminjaman_id' => $request->peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);
        $pengembalian->peminjaman->save();
        $pengembalian->peminjaman->stock->qty = $pengembalian->peminjaman->stock->qty + $pengembalian->peminjaman->amount;
        $pengembalian->peminjaman->stock->save();

        Laporan::create([
            'item_id' => $pengembalian->peminjaman->id,
            'item_type' => 'Pengembalian',
        ]);
        //redirect to index
        return redirect()->route('pengembalians.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }



    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'ip_address',
            'nama_cabang',
            'nama_komputer',
            'tanggal_pengembalian',
            'serial_number',
            'user',
            'divisi',
            'jenis',
        ]);



        $pengembalian->update([
            'ip_address' => $request->ip_address,
            'nama_cabang' => $request->nama_cabang,
            'nama_komputer' => $request->nama_komputer,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'serial_number' => $request->serial_number,
            'user' => $request->user,
            'divisi' => $request->divisi,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('pengembalians.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function destroy(Pengembalian $pengembalian)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        if($pengembalian->laporan) $pengembalian->laporan->delete();
        $pengembalian->delete();

        //redirect to index
        return redirect()->route('pengembalians.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
