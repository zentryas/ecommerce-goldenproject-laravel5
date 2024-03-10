@extends('layouts.crovax-admin')
@section('title','Data Produk')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Produk</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Produk</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-gradient-primary mb-3" data-toggle="modal" data-target="#tambah">Add New Produk</button>
            <a href="{{ route('admin.produk.cetak') }}" class="btn btn-gradient-danger mb-3">EXPORT PDF</a>
            <div class="card">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Info Produk</th>
                                <th>Supplier</th>
                                <th>Harga Supplier</th>
                                <th>Harga Jual</th>
                                <th colspan="5" class="text-center">Stok Size</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="4">
                                    <th>39</th>
                                    <th>40</th>
                                    <th>41</th>
                                    <th>42</th>
                                    <th>43</th>
                                </td>
                                <td></td>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($produk as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>
                                    <img src="{{ asset($data->gambar_produk) }}" alt="" height="52">
                                    <p class="d-inline-block align-middle mb-0">
                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $data->nama_produk }}</a> 
                                        <br>
                                        <span class="text-muted font-13">{{ $data->kategori->nama_kategori }}</span> 
                                    </p>
                                </td>
                                <td>{{ $data->supplier->nama_supplier }}</td>
                                <td class="text-danger">Rp. {{ number_format($data->harga_supplier) }}</td>
                                <td class="text-success">Rp. {{ number_format($data->harga_jual) }}</td>
                                <td>
                                    {{ $data->stok1 }} pcs
                                </td>
                                <td>
                                    {{ $data->stok2 }} pcs
                                </td>
                                <td>
                                    {{ $data->stok3 }} pcs
                                </td>
                                <td>
                                    {{ $data->stok4 }} pcs
                                </td>
                                <td>
                                    {{ $data->stok5 }} pcs
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="far fa-edit text-info mr-1"></i></a>                                      
                                    <a href="#" class="delete" produk-id="{{ $data->id }}" produk-nama="{{ $data->nama_produk }}"><i class="far fa-trash-alt text-danger"></i></a>                                            
                                </td>
                            </tr>

                            <div class="modal fade" id="edit{{$data->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        @include('admin.produk.update')
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            @php
                                $no++;
                            @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Add New Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.produk.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Masukan Nama Produk" name="nama_produk">
                                @error('nama_produk')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                                    <option value="">--Pilih Supplier--</option>
                                    @foreach ($supplier as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Stok Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Size 39
                                        </div>
                                    </div>
                                    <input type="number" class="form-control currency" name="stok1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Size 40
                                        </div>
                                    </div>
                                    <input type="number" class="form-control currency" name="stok2">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Size 41
                                        </div>
                                    </div>
                                    <input type="number" class="form-control currency" name="stok3">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Size 42
                                        </div>
                                    </div>
                                    <input type="number" class="form-control currency" name="stok4">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Size 43
                                        </div>
                                    </div>
                                    <input type="number" class="form-control currency" name="stok5">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" name="gambar_produk" class="dropify">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>  
                            <div class="form-group">
                                <label>Harga Supplier</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="harga_supplier">
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
                                    <input type="text" class="form-control currency" name="harga_jual">
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
    <script type="text/javascript">
        $('.delete').click(function()
        {
            var id = $(this).attr('produk-id');
            var nama = $(this).attr('produk-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data produk "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/produk/"+id+"/delete";
              }
            });
        });
    </script>
@stop