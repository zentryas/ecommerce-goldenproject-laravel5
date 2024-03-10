<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use App\Kategori;
use App\Produk;
use App\Provinsi;
use App\Kota;
use App\Pesanan;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index($id)
    {
        $admin     = Admin::find($id);
        $user      = User::all();
        $kategori  = Kategori::all();
        $produk    = Produk::all();
        $province  = Provinsi::all();
        $city      = Kota::all();

        return view('admin.akun.index', compact('admin', 'user', 'kategori', 'produk', 'city', 'province'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $admin = Admin::find($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'alamat' => $request->alamat
        ]);
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }

    public function gantiPass($id)
    {
        $admin     = Admin::find($id);
        $user      = User::all();
        $kategori  = Kategori::all();
        $produk    = Produk::all();

        return view('admin.akun.ganti', compact('admin', 'user', 'kategori', 'produk'));
    }

    public function ganti(Request $request, $id)
    {
        // dd($request->all());
        $admin = Admin::find($id);
        $admin->update([
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }
}
