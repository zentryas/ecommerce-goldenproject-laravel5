<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Pesanan;
use App\PesananDetail;
use App\Pembayaran;
use Carbon\Carbon;
use Auth;

use App\Province;
use App\City;
use App\Courier;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $produk         = Produk::orderBy('nama_produk', 'ASC')->get();
        $kat_1          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '1')->get();
        $kat_2          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '2')->get();
        $kat_3          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '3')->get();

        return view('welcome', compact('produk', 'kat_1', 'kat_2', 'kat_3'));
    }

    public function produk(Request $request)
    {
        $produk        = Produk::orderBy('nama_produk', 'ASC')->get();
        $kat_1          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '1')->get();
        $kat_2          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '2')->get();
        $kat_3          = Produk::orderBy('nama_produk', 'ASC')->where('kategori_id', '3')->get();

        return view('pelanggan.produk', compact('produk', 'kat_1', 'kat_2', 'kat_3'));
    }

    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table mobil sesuai pencarian data
    //     $pro = Produk::where('nama_produk', 'like', "%" . $cari . "%")->get();
    //     $kategori = Kategori::all();

    //     return view('pelanggan.produk', compact('pro', 'kategori'));
    // }

    // public function contactUs()
    // {
    //     return view('pelanggan.contactUs');
    // }

    // public function panduan()
    // {
    //     return view('pelanggan.panduan');
    // }

    // public function katalog()
    // {
    //     return view('pelanggan.katalog');
    // }
}
