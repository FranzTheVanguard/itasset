<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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

        $laporans = Laporan::all();
        return view('laporans.index', compact('laporans'));
    }
}
