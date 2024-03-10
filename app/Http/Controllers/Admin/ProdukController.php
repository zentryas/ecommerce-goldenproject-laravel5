<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Produk;
use App\Kategori;
use App\Supplier;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('admin.produk.index', compact('produk', 'kategori', 'supplier'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_produk' => 'required',
            'supplier_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $gambar = $request->gambar_produk;
        $new_gambar = time() . $gambar->getClientOriginalName();

        $produk = Produk::create([
            'nama_produk'   => $request->nama_produk,
            'kategori_id'   => $request->kategori_id,
            'supplier_id'     => $request->supplier_id,
            'harga_supplier'  => $request->harga_supplier,
            'harga_jual'      => $request->harga_jual,
            'gambar_produk' => 'uploads/' . $new_gambar,
            'stok1'         => $request->stok1,
            'stok2'         => $request->stok2,
            'stok3'         => $request->stok3,
            'stok4'         => $request->stok4,
            'stok5'         => $request->stok5,
            'deskripsi'     => $request->deskripsi
        ]);

        $gambar->move('uploads/', $new_gambar);
        return redirect()->back()->with('sukses', 'Produk baru berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_produk' => 'required|min:3'
        ]);

        $produk = Produk::findorfail($id);

        if ($request->has('gambar_produk')) {
            $gambar = $request->gambar_produk;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('uploads/', $new_gambar);

            $post_data = [
                'nama_produk'   => $request->nama_produk,
                'kategori_id'   => $request->kategori_id,
                'supplier_id'     => $request->supplier_id,
                'harga_supplier'  => $request->harga_supplier,
                'harga_jual'      => $request->harga_jual,
                'gambar_produk' => 'uploads/' . $new_gambar,
                'stok1'         => $request->stok1,
                'stok2'         => $request->stok2,
                'stok3'         => $request->stok3,
                'stok4'         => $request->stok4,
                'stok5'         => $request->stok5,
                'deskripsi'     => $request->deskripsi
            ];
            // return 'ada upload';
            File::delete($produk->gambar_produk);
        } else {
            $post_data = [
                'nama_produk'   => $request->nama_produk,
                'kategori_id'   => $request->kategori_id,
                'supplier_id'     => $request->supplier_id,
                'harga_supplier'  => $request->harga_supplier,
                'harga_jual'      => $request->harga_jual,
                'stok1'         => $request->stok1,
                'stok2'         => $request->stok2,
                'stok3'         => $request->stok3,
                'stok4'         => $request->stok4,
                'stok5'         => $request->stok5,
                'deskripsi'     => $request->deskripsi
            ];
            // return 'tidak ada upload';
        }

        $produk->update($post_data);
        return redirect()->route('admin.produk')->with('sukses', 'Produk baru berhasil diupdate');
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        File::delete($produk->gambar_produk);
        $produk->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil dihapus!');
    }
    
    public function laporanProduk()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        
        return view('admin.produk.cetak', compact('produk', 'kategori', 'supplier'));
    }
}
