<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {


        $stocks = Stock::all();


        return view('stocks.index', compact('stocks'));
    }
    public function create()
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        return view('stocks.create');
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
        // dd($request);exit;
        //create post
        Stock::create([
            'ip_address' => $request->ip_address,
            'nama_cabang' => $request->nama_cabang,
            'nama_komputer' => $request->nama_komputer,
            'serial_number' => $request->serial_number,
            'dipinjam' => 'N',
        ]);

        //redirect to index
        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Stock $stock)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        return view('stocks.edit', compact('stock'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Stock $stock)
    {
        //validate form
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'ip_address',
            'nama_cabang',
            'nama_komputer',
            'serial_number',
        ]);


        //update 
        $stock->update([
            'ip_address' => $request->ip_address,
            'nama_cabang' => $request->nama_cabang,
            'nama_komputer' => $request->nama_komputer,
            'serial_number' => $request->serial_number,
        ]);

        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index

    public function destroy(Stock $stock)
    {
        /** @var User|null $user */
        $user = auth()->user();
        if (!$user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        $stock->delete();

        //redirect to index
        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
