<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $users = count(User::all());
        $peminjaman = count(Peminjaman::all());
        $pengembalian = count(Pengembalian::all());
        $stock = count(Stock::all());
        return view('home', compact('users', 'peminjaman', 'pengembalian', 'stock'));
    }
}
