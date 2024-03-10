<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Kategori;
use App\Produk;
use App\Supplier;
use App\Pesanan;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin     = Admin::all();
        $pelanggan = User::all();
        $kategori  = Kategori::all();
        $produk    = Produk::all();
        $supplier  = Supplier::all();

        $waiting            = Pesanan::where('status_pesanan', 2)->get();
        $sudah_dibayar      = Pesanan::where('status_pesanan', 3)->get();
        $sedang_dikirim     = Pesanan::where('status_pesanan', 4)->get();
        $selesai            = Pesanan::where('status_pesanan', 5)->get();
        $batal              = Pesanan::where('status_pesanan', 6)->get();

        return view('admin', compact('admin', 'pelanggan', 'kategori', 'produk', 'supplier', 'waiting', 'sudah_dibayar', 'sedang_dikirim', 'selesai', 'batal'));
    }
}
