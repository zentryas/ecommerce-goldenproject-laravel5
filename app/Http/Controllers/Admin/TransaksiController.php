<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;
use App\Kategori;
use App\Pesanan;
use App\PesananDetail;
use App\Pembayaran;

use App\Admin;
use App\Provinsi;
use App\Kota;

class TransaksiController extends Controller
{
    public function index()
    {
        $pesanan    = Pesanan::where('status_pesanan', '2')->get();

        return view('admin.transaksi.index', compact('pesanan'));
    }

    public function sudahDibayar()
    {
        $pesanan    = Pesanan::where('status_pesanan', '3')->get();

        return view('admin.transaksi.sudahDibayar', compact('pesanan'));
    }

    public function sudahDikirim()
    {
        $pesanan    = Pesanan::where('status_pesanan', '4')->get();

        return view('admin.transaksi.sudahDikirim', compact('pesanan'));
    }

    public function selesai()
    {
        $pesanan    = Pesanan::where('status_pesanan', '5')->get();

        return view('admin.transaksi.selesai', compact('pesanan'));
    }

    public function batal()
    {
        $pesanan    = Pesanan::where('status_pesanan', '6')->get();

        return view('admin.transaksi.batal', compact('pesanan'));
    }

    public function cetak(Request $request, $id)
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

        // dd($prov);

        return view('admin.transaksi.cetakAlamat', compact('pembayaran', 'pesanan_details', 'admin', 'prov', 'city', 'prov_admin', 'city_admin'));
    }

    public function lihat(Request $request, $id)
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

        // dd($prov);

        return view('admin.transaksi.lihat', compact('pembayaran', 'pesanan_details', 'admin', 'prov', 'city', 'prov_admin', 'city_admin'));
    }

    public function kirimResi($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();

        return view('admin.transaksi.kirimResi', compact('pesanan'));
    }

    public function kirimResiPost(Request $request, $id)
    {
        $this->validate($request, [
            'nomor_resi' => 'required'
        ]);

        $pesanan = Pesanan::find($id);
        $pesanan->update([
            'nomor_resi' => $request->nomor_resi,
            'status_pesanan' => "4"
        ]);
        return redirect()->route('admin.sudah-dikirim')->with('sukses', 'Nomor resi berhasil dikirimkan');
    }

    public function ubahStatus($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();

        return view('admin.transaksi.ubah-status', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $this->validate($request, [
            'status_pesanan' => 'required'
        ]);

        // dd($request->all());

        $pesanan = Pesanan::find($id);
        $pesanan->update([
            'status_pesanan' => $request->status_pesanan
        ]);
        return redirect()->route('admin.selesai')->with('sukses', 'Status pesanan berhasil di update!');
    }
}
