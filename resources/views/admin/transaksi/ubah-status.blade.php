@extends('layouts.crovax-admin')
@section('title','Ubah Status Pengiriman dari Admin')
@section('konten')
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Sedang dikirim</a></li>
                        <li class="breadcrumb-item active">Ubah Status Pengiriman dari Admin</li>
                    </ol>
                </div>
                <h4 class="page-title">Ubah Status Pengiriman dari Admin</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/transaksi/ubah-status/{{ $pesanan->id }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Pesanan</label>
                                <input type="text" class="form-control" value="{{ $pesanan->kode_pesanan }}" readonly>
                            </div>  
                            <div class="form-group">
                                <label>Status Pesanan</label>
                                <select name="status_pesanan" class="form-control">
                                    <option value="4" @if($pesanan->status_pesanan == '4') selected @endif>Paket sedang dikirim</option>
                                    <option value="5" @if($pesanan->status_pesanan == '5') selected @endif>Paket sudah sampai</option>
                                </select>
                            </div>                        
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection