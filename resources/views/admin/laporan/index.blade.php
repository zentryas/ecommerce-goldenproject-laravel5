@extends('layouts.crovax-admin')
@section('title','Cetak Laporan')
@section('konten')
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Report</a></li>
                        <li class="breadcrumb-item active">Cetak Laporan</li>
                    </ol>
                </div>
                <h4 class="page-title">Cetak Laporan</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Tanggal Selesai">
                        </div>
                    </div>
                    <br>

                    <a href="" onclick="this.href='/admin/laporan/'+document.getElementById('tgl_mulai').value+'/'+document.getElementById('tgl_selesai').value" 
                    target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
