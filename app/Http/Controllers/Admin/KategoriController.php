<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_kategori' => 'required|min:3',
            'keterangan'    => 'required'
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => Str::slug($request->nama_kategori),
            'keterangan'    => $request->keterangan
        ]);

        return redirect()->back()->with('sukses','Ketegori berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:3'
        ]);

        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan
        ]);
        return redirect()->route('admin.kategori')->with('sukses','Ketegori berhasil diupdate');
    }

    public function delete($id)
    {
    	$kategori = Kategori::find($id);
    	$kategori->delete();
    	return redirect()->back()->with('sukses','Data Berhasil dihapus!');
    }
}
