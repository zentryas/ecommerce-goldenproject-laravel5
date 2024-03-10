@extends('layouts.crovax-admin')
@section('title','Info Pelanggan')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Halaman Admin</a></li>
                        <li class="breadcrumb-item active">Info Pelanggan</li>
                    </ol>
                </div>
                <h4 class="page-title">Info Pelanggan</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Identitas</th>
                                <th>Nomor Hp</th>
                                <th>Jenis Kelamin</th>
                                <th width="20%">Alamat</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>
                                    <p class="d-inline-block align-middle mb-0">
                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $data->name }}</a> 
                                        <br>
                                        <span class="text-muted font-13">{{ $data->email }}</span> 
                                    </p>
                                </td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    @if($data->active == 1)
                                        <center><span class="badge badge-md badge-soft-success">Teraktivasi</span></center>
                                    @else
                                        <center><span class="badge badge-md badge-soft-danger">Belum Aktivasi</span></center>
                                    @endif
                                </td>
                            </tr>
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
@endsection
