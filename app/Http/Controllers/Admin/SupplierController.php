<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.index', compact('supplier'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_supplier' => 'required',
            'keterangan'    => 'required',
            'no_hp'         => 'required',
            'alamat'        => 'required'
        ], [
            'nama_supplier.required' => 'Nama supplier tidak boleh kosong.',
        ]);

        $supplier = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'keterangan'    => $request->keterangan
        ]);

        return redirect()->back()->with('sukses', 'Ketegori berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_supplier' => 'required',
            'keterangan'    => 'required',
            'no_hp'         => 'required',
            'alamat'        => 'required'
        ]);

        $supplier = Supplier::find($id);
        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'keterangan'    => $request->keterangan
        ]);
        return redirect()->route('admin.supplier')->with('sukses', 'Ketegori berhasil diupdate');
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil dihapus!');
    }
}
