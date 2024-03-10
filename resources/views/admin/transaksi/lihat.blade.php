@extends('layouts.crovax-admin')
@section('title','Informasi Detail')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Menunggu Pembayaran</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body invoice-head"> 
                    <div class="row">
                        <div class="col-md-12 text-center">                                                
                            <img src="{{ asset('crovex')}}/images/logo-new.png" alt="logo-small" class="logo-sm mr-2" height="50"> <br>                                             
                            <b>GOLDEN FACE STORE</b>  <br>
                            <label>Alamat : Gg. Megatruh, Karang Wuni, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</label>                                           
                        </div><!--end col-->    
                    </div><!--end row-->     
                </div><!--end card-body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Kode Pesanan : <span class="text-success">{{ $pembayaran->pesanan->kode_pesanan}}</span></strong><br>
                                @if( $pembayaran->status_pembayaran == "pending")
                                    <span class="text-warning">{{ $pembayaran->status_pembayaran }}</span>
                                @elseif( $pembayaran->status_pembayaran == "success")
                                    <span class="text-success">{{ $pembayaran->status_pembayaran }}</span>
                                @elseif( $pembayaran->status_pembayaran == "expired")
                                    <span class="text-danger">{{ $pembayaran->status_pembayaran }}</span>
                                @endif
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">

                        </div>                                           
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Identitas Pengirim</strong><br>
                                Golden Face Store<br>
                                {{ $admin->no_hp }}<br>
                                {{ $admin->alamat }}<br>
                                {{ $city_admin->nama_kota }}, {{ $prov_admin->nama_provinsi }}, Indonesia
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Identitas Penerima</strong><br>
                                {{ $pembayaran->pesanan->pelanggan->name }}<br>
                                {{ $pembayaran->pesanan->pelanggan->no_hp }}<br>
                                {{ $pembayaran->pesanan->alamat_kirim }}<br>
                                {{ $city->nama_kota }}, {{ $prov->nama_provinsi }} Indonesia
                            </address>
                        </div>                                           
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Informasi Pengiriman</strong><br>
                                Kurir             : {{ $pembayaran->pesanan->kurir }}<br>
                                Paket Kurir       : {{ $pembayaran->pesanan->paket_kurir }}<br>
                                Durasi Pengiriman : {{ $pembayaran->pesanan->estimasi }} (hari) <br>
                                Berat :     @if( $pembayaran->pesanan->berat == "1000")
                                                1 kg
                                            @elseif( $pembayaran->pesanan->berat == "2000")
                                                2 kg
                                            @elseif( $pembayaran->pesanan->berat == "3000")
                                                3 kg
                                            @elseif( $pembayaran->pesanan->berat == "4000")
                                                4 kg
                                            @elseif( $pembayaran->pesanan->berat == "5000")
                                                5 kg
                                            @endif
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Tanggal Pemesanan</strong><br>
                                {{ date("d/m/Y", strtotime($pembayaran->pesanan->tgl_pesanan)) }}<br>
                                @if(!empty($data->pesanan->nomor_resi))
                                    <strong>Nomor Resi</strong><br>
                                    <span class="text-success">{{ $pembayaran->pesanan->nomor_resi }}</span>
                                @endif
                            </address>
                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive project-invoice">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Size</th> 
                                            <th>Total</th>
                                        </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pesanan_details as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                <img src="{{ asset($data->produk->gambar_produk) }}" alt="" width="100">
                                                <h5 class="mt-0 mb-1">{{ $data->produk->nama_produk }}</h5>
                                                <p class="mb-0 text-muted">Rp. {{ number_format($data->produk->harga_jual) }}</p>
                                            </td>
                                            <td>x {{ $data->jumlah_beli }}</td>
                                            <td>
                                                @if($data->ukuran == "stok1")
                                                    <span class="badge badge-success badge-pill">39</span>
                                                @elseif($data->ukuran == "stok2")
                                                    <span class="badge badge-success badge-pill">40</span>
                                                @elseif($data->ukuran == "stok3")
                                                    <span class="badge badge-success badge-pill">41</span>
                                                @elseif($data->ukuran == "stok4")
                                                    <span class="badge badge-success badge-pill">42</span>
                                                @elseif($data->ukuran == "stok5")
                                                    <span class="badge badge-success badge-pill">43</span>
                                                @endif
                                            <td>Rp. {{ number_format($data->jumlah_harga) }}</td>
                                        </tr><!--end tr-->
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                        <tr>                                                        
                                            <td colspan="3" class="border-0"></td>
                                            <td class="border-0 font-14 text-dark"><b>Sub Total</b></td>
                                            <td class="border-0 font-14 text-dark"><b>Rp. {{ number_format($pembayaran->pesanan->total_harga) }}</b></td>
                                        </tr><!--end tr-->
                                        <tr>
                                            <th colspan="3" class="border-0"></th>                                                        
                                            <td class="border-0 font-14 text-dark"><b>Ongkir</b></td>
                                            <td class="border-0 font-14 text-dark"><b>Rp. {{ number_format($pembayaran->pesanan->biaya_ongkir) }}</b></td>
                                        </tr><!--end tr-->
                                        <tr class="bg-black text-white">
                                            <th colspan="3" class="border-0"></th>                                                        
                                            <td class="border-0 font-14"><b>Total Harga</b></td>
                                            <td class="border-0 font-14"><b>Rp. {{ number_format($pembayaran->total_pembayaran) }}</b></td>
                                        </tr><!--end tr-->
                                    </tbody>
                                </table><!--end table-->
                            </div>  <!--end /div-->                                          
                        </div>  <!--end col-->                                      
                    </div><!--end row-->

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <h5 class="mt-4">Syarat & Ketentuan :</h5>
                            <ul class="pl-3">
                                <li><small class="font-12">Pelanggan menggunakan pembayaran menggunakan pihak ke 3</small></li>
                                <li><small class="font-12">Pelanggan tidak membayarkan melewati batas waktu yang sudah ditentukan maka akan batal otomatis dengan sistem</small ></li>
                                <li><small class="font-12">Pelanggan maupun admin tidak dapat melakukan pembatalan transaksi</small></li>                                            
                            </ul>
                        </div> <!--end col-->                                       
                    </div><!--end row-->
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                            
                        </div><!--end col-->
                        <div class="col-lg-12 col-xl-4">
                            <div class="float-right d-print-none">
                                <a href="/admin/transaksi/cetakAlamat/{{ $pembayaran->pesanan->id }}" target="_blank" class="btn btn-gradient-info"><i class="fa fa-print"></i></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row--> 

</div><!-- container -->
@stop