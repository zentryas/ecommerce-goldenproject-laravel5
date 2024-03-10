@extends('layouts.crovax-admin')
@section('title','Kirim Nomor Resi')
@section('konten')
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Sudah dibayar</a></li>
                        <li class="breadcrumb-item active">Kirim Resi</li>
                    </ol>
                </div>
                <h4 class="page-title">Kirim Resi</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/transaksi/kirim-resi/{{ $pesanan->id }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Pesanan</label>
                                <input type="text" class="form-control" value="{{ $pesanan->kode_pesanan }}" readonly>
                            </div>  
                            <div class="form-group">
                                <label>Nomor Resi</label>
                                <input type="text" class="form-control" name="nomor_resi" required>
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