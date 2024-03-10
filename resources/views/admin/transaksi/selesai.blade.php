@extends('layouts.crovax-admin')
@section('title','Transaksi Selesai')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Transaksi</a></li>
                        <li class="breadcrumb-item active">Transaksi Selesai</li>
                    </ol>
                </div>
                <h4 class="page-title">Transaksi Selesai</h4>
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
                                        <th>Tanggal Pesan</th>
                                        <th>Kode Pesanan</th>
                                        <th>Status Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Nomor Resi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pesanan as $data)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ date("d/m/Y", strtotime($data->tgl_pesanan)) }}</td>
                                        <td class="text-primary">{{ $data->kode_pesanan }}</td>
                                        <td>Paket sudah sampai dan transaksi selesai!</td>
                                        <td class="text-success">Rp. {{ number_format($data->total_harga+$data->biaya_ongkir) }}</td>
                                        <td>
                                            @if(empty($data->nomor_resi))
                                                <span class="badge badge-danger">Belum Ada</span>
                                            @else
                                                {{ $data->nomor_resi }}
                                            @endif 
                                        </td>
                                        <td>
                                            <a href="/admin/transaksi/lihat/{{ $data->id }}" class="btn btn-warning btn-sm">Invoice</a>                                            
                                        </td>
                                    </tr>
                                </div>
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