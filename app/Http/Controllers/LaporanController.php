<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $pengembalians = Pengembalian::all();
        $laporans = Laporan::all();
        return view('laporans.index', compact('laporans', 'pengembalians'));
    }
}
