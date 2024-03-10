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
use App\Admin;
use App\Provinsi;
use App\Kota;
use App\Kurir;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PesananController extends Controller
{
    public function index($id)
    {
        $produk = Produk::find($id);
        return view('pelanggan.pesan.index', compact('produk'));
    }

    public function add_keranjang(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();
        $apa = $request->ukuran;
        // dd($request->all());
        if ($request->ukuran == null) {
            return redirect()->back()->with('maaf', 'Tolong isi jenis ukuran!');
        }
        if ($request->jumlah_beli == 0) {
            return redirect()->back()->with('maaf', 'Tolong isi banyak pesanan!');
        }
        // dd($apa);
        if ($request->jumlah_beli > $produk->$apa) {
            return redirect()->back()->with('maaf', 'Maaf pesanan anda melebihi stok');
        }

        //cek validasi
        $cek_pesanan = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', 0)->first();
        //simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan                  = new Pesanan;
            $pesanan->pelanggan_id    = Auth::user()->id;
            $pesanan->admin_id        = 1;
            $pesanan->kode_pesanan    = "PESANAN" . "-" . mt_rand(100, 999);
            // dd($pesanan->kode_pesanan);
            $pesanan->tgl_pesanan     = $tanggal;
            $pesanan->status_pesanan  = 0;
            $pesanan->total_harga     = 0;
            $pesanan->save();
        }
        //simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', 0)->first();
        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail               = new PesananDetail;
            $pesanan_detail->produk_id    = $produk->id;
            $pesanan_detail->pesanan_id   = $pesanan_baru->id;
            $pesanan_detail->ukuran       = $apa;
            $pesanan_detail->jumlah_beli  = $request->jumlah_beli;
            $pesanan_detail->jumlah_harga = $produk->harga_jual * $request->jumlah_beli;
            $pesanan_detail->save();
        } else {
            $pesanan_detail               = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah_beli  = $pesanan_detail->jumlah_beli + $request->jumlah_beli;
            //harga sekarang
            $harga_pesanan_detail_baru    = $produk->harga_jual * $request->jumlah_beli;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan              = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', 0)->first();
        $pesanan->total_harga = $pesanan->total_harga + $produk->harga_jual * $request->jumlah_beli;
        $pesanan->update();

        return redirect('/keranjang')->with('sukses', 'Produk berhasil dimasukan keranjang!');
    }

    public function keranjang()
    {
        $pesanan = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', 0)->first();
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        } else {
            return view('pelanggan.pesan.keranjang.kosong');
        }

        return view('pelanggan.pesan.keranjang.index', compact('pesanan', 'pesanan_details'));
    }

    public function hapus($id)
    {
        $pesanan_detail       = PesananDetail::where('id', $id)->first();

        $pesanan              = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->total_harga = $pesanan->total_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        return redirect('keranjang')->with('sukses', 'Pesanan berhasil dihapus');
    }

    public function checkout()
    {
        $pesanan = Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status_pesanan = 1;
        $pesanan->update();

        return redirect('/keranjang/checkout_detail/' . $pesanan_id)->with('sukses', 'Silahkan tentukan alamat pengiriman dan ekspedisi');
    }

    public function checkout_detail(Request $request, $id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        $couriers = Kurir::pluck('ekspedisi', 'kode');
        $provinces = Provinsi::pluck('nama_provinsi', 'provinsi_id');

        return view('pelanggan.pesan.checkout.checkout-detail', compact('pesanan', 'pesanan_details', 'couriers', 'provinces'));
    }

    public function getCities($id)
    {
        $city = Kota::where('provinsi_id', $id)->pluck('nama_kota', 'kota_id');
        return json_encode($city);
    }

    public function post_service(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 419, // ID kota/kabupaten asal 38
            'destination'   => $request->tujuan, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->kurir // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        return response()->json($cost[0]['costs']);
    }
    
    public function batalkanPesanan($id){
        // dd($id);
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->update([
            'status_pesanan' => 6
        ]);
        return redirect()->route('pelanggan.riwayat')->with('sukses', 'Pesanan berhasil dibatalkan.');
    }
}
