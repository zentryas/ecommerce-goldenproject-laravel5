<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesanan;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function lihat($tgl_mulai, $tgl_selesai)
    {
        // dd(["tanggal awal: ".$tanggal_mulai, "Tanggal Akhir : ".$tgl_selesai]);
        $pembayaran = Pesanan::whereBetween('tgl_pesanan', [$tgl_mulai, $tgl_selesai])->where('status_pesanan', 5)->get();
        // dd($pembayaran);
        return view('admin.laporan.cetak', compact('pembayaran','tgl_mulai','tgl_selesai'));
    }
}
