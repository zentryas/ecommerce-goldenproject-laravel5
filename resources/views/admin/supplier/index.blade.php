@extends('layouts.crovax-admin')
@section('title','Data Supplier')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Supplier</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Supplier</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-gradient-primary mb-3" data-toggle="modal" data-target="#tambah">Add New Supplier</button>
            <div class="card">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($supplier as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->nama_supplier }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="far fa-edit text-info mr-1"></i></a>
                                    <a href="#" class="delete" kategori-id="{{ $data->id }}" kategori-nama="{{ $data->nama_kategori }}"><i class="far fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$data->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/admin/supplier/{{ $data->id }}/update" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary">Update Data Supplier</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-danger">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Supplier</label>
                                                    <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier" value="{{ $data->nama_supplier }}" autocomplete="off">
                                                    @error('nama_supplier')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>   
                                                <div class="form-group">
                                                    <label>Nomor HP</label>
                                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $data->no_hp }}" autocomplete="off">
                                                    @error('no_hp')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label>Alamat Lengkap</label>
                                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" autocomplete="off">{{ $data->alamat }}</textarea>
                                                    @error('alamat')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3" autocomplete="off">{{ $data->keterangan }}</textarea>
                                                    @error('keterangan')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>                       
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
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
                <h5 class="modal-title text-primary">Add New Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.supplier.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier" autocomplete="off">
                        @error('nama_supplier')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" autocomplete="off">
                        @error('no_hp')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" autocomplete="off"></textarea>
                        @error('alamat')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3" autocomplete="off"></textarea>
                        @error('keterangan')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>                       
                </div>
                <div class="modal-footer">
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
            var id = $(this).attr('kategori-id');
            var nama = $(this).attr('kategori-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data kategori "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/kategori/"+id+"/delete";
              }
            });
        });
    </script>
@stop
