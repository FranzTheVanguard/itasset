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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        
        //create post
        Stock::create([
            'nama_cabang' => $request->nama_cabang,
            'nama_komputer' => $request->nama_komputer,
            'qty' => $request->qty,
            'ori_qty' => $request->qty,
        ]);

        //redirect to index
        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Stock $stock)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
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
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');
        $this->validate($request, [
            'nama_cabang',
            'nama_komputer',
            'qty',
            'ori_qty'
        ]);
        // dd($stock->peminjaman->sum('amount'));
        if($stock->peminjaman->sum('amount') > $request->qty || $stock->peminjaman->sum('amount') > $request->ori_qty || $request->qty > $request->ori_qty){
            return redirect()->route('stocks.edit')->with(['error' => 'Qty tidak valid!']);
        }
        $stock->update([
            'nama_cabang' => $request->nama_cabang,
            'nama_komputer' => $request->nama_komputer,
            'qty' => $request->qty,
            'ori_qty' => $request->ori_qty,

        ]);

        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //redirect to index

    public function destroy(Stock $stock)
    {
        /** @var User|null $_user */
        $_user = auth()->user();
        if (!$_user->isAdmin()) abort(403, 'unauthorized');

        //delete post
        $stock->delete();

        //redirect to index
        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
