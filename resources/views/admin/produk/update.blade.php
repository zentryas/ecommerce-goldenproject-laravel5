<form action="/admin/produk/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title text-primary">Update Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
    </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{ $data->nama_produk }}">
                    </div> 
                    <div class="form-group">
                        <label>Supplier</label>
                            <select name="supplier_id" class="form-control">
                            @foreach ($supplier as $datas)
                                <option value="{{ $datas->id }}"
                                @if($data->supplier->id == $datas->id)
                                    selected
                                @endif
                                >{{ $datas->nama_supplier }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori Produk</label>
                        <select name="kategori_id" class="form-control">
                            @foreach ($kategori as $datak)
                                <option value="{{ $datak->id }}"
                                @if($data->kategori->id == $datak->id)
                                    selected
                                @endif
                                >{{ $datak->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Stok Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Size 39
                                </div>
                            </div>
                            <input type="number" class="form-control currency" name="stok1" value="{{ $data->stok1 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Size 40
                                </div>
                            </div>
                            <input type="number" class="form-control currency" name="stok2"  value="{{ $data->stok2 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Size 41
                                </div>
                            </div>
                            <input type="number" class="form-control currency" name="stok3"  value="{{ $data->stok3 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Size 42
                                </div>
                            </div>
                            <input type="number" class="form-control currency" name="stok4"  value="{{ $data->stok4 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Size 43
                                </div>
                            </div>
                            <input type="number" class="form-control currency " name="stok5"  value="{{ $data->stok5 }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset($data->gambar_produk)}}" alt="" width="370" height="170">
                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" name="gambar_produk" class="">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ $data->deskripsi }}</textarea>
                    </div>  
                    <div class="form-group">
                        <label>Harga Supplier</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" class="form-control currency" name="harga_supplier" value="{{ $data->harga_supplier }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" class="form-control currency" name="harga_jual" value="{{ $data->harga_jual }}">
                        </div>
                    </div>
                </div>
            </div>                  
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
</form>