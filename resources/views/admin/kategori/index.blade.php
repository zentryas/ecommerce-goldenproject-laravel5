@extends('layouts.crovax-admin')
@section('title','Data Kategori')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Master Data</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Kategori</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-gradient-primary mb-3" data-toggle="modal" data-target="#tambah">Add New Kategori</button>
            <div class="card">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kategori as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="far fa-edit text-info mr-1"></i></a>
                                    <a href="#" class="delete" kategori-id="{{ $data->id }}" kategori-nama="{{ $data->nama_kategori }}"><i class="far fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$data->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/admin/kategori/{{ $data->id }}/update" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary">Update Data Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-danger">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Kategori</label>
                                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ $data->nama_kategori }}">
                                                    @error('nama_kategori')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>   
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                                                    @error('keterangan')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                <h5 class="modal-title text-primary">Add New Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kategori.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori">
                        @error('nama_kategori')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>   
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3"></textarea>
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
