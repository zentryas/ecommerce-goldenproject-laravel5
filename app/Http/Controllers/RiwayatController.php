<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Produk;
use App\Kategori;
use App\Pesanan;
use App\PesananDetail;
use App\Pembayaran;

use App\Admin;
use App\Provinsi;
use App\Kota;

class RiwayatController extends Controller
{
    public function index()
    {

    	$pesanans = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', '!=',0)->get();

    	return view('pelanggan.riwayat.index', compact('pesanans'));
    }

    public function riwayatPsn(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('pesanan_id', $id)->first();

        //detail pesanan
        $pesanan   = Pesanan::find($id);
        $pesanan_details = PesananDetail::where('pesanan_id', $id)->get();
        
        //mengambil data admin
        $admin      = Admin::where('id', 1)->first();
        $prov_admin = Provinsi::where('provinsi_id', 5)->first();
        $city_admin = Kota::where('kota_id', 419)->first();

        //memanggil provinsi dan kota tujuan
        $prov = Provinsi::where('provinsi_id', $pesanan->provinsi_id)->first();
        $city = Kota::where('kota_id', $pesanan->kota_id)->first();

     	return view('pelanggan.riwayat.pesanan', compact('pembayaran','pesanan_details','admin','prov','city','prov_admin','city_admin'));
    }

    public function post(Request $request, $id)
    {
        // dd($request->all());
        $pembayaran = Pembayaran::where('pesanan_id', $id)->first();
        $pembayaran->update([
            'testimonial' => $request->testimonial
        ]);

        //detail pesanan
        $pesanan   = Pesanan::find($id);
        $pesanan->update([
            'status_pesanan' => "5"
        ]);

        return redirect()->back()->with('sukses','Testimonial berhasil dikirim!, Terimakasih');
    }
}
