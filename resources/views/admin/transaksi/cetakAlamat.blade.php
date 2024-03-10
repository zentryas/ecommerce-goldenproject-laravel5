<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <title>Cetak Alamat | Golden Face Store</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('crovex') }}/images/logo-icon.ico">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>

<body onload="window.print();" style="background: #fff">
<div class="container-fluid">
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
                <hr style="border: 1px solid #000;">
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
                                                    <span class="badge badge-success badge-pill">29</span>
                                                @elseif($data->ukuran == "stok2")
                                                    <span class="badge badge-success badge-pill">30</span>
                                                @elseif($data->ukuran == "stok3")
                                                    <span class="badge badge-success badge-pill">31</span>
                                                @elseif($data->ukuran == "stok4")
                                                    <span class="badge badge-success badge-pill">32</span>
                                                @elseif($data->ukuran == "stok5")
                                                    <span class="badge badge-success badge-pill">33</span>
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
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row--> 

    <hr style="border: 1px solid #000;">

    <div class="row justify-content-center mt-4">
        <div class="col-md-3 col-1"></div>
        <div class="col-md-6 col-10 text-center" style="border: 1px solid #000;">
            <img src="{{ asset('template_users/img/logo.png') }}" alt="" width="50%" class="mb-3 pt-2">
            <div class="row">
                <div class="col-md-5 col-5 text-right">
                    <address>
                        <strong>Identitas Pengirim</strong><br>
                        Nama <br>
                        Nomor Hp<br>
                        Alamat<br>
                    </address> <br>
                    <address>
                        <strong>Identitas Penerima</strong><br>
                        Nama <br>
                        Nomor Hp<br>
                        Alamat<br>
                    </address>
                </div>
                <div class="col-md-7 col-7 text-left">
                    <address>
                        <br>
                        : Golden Face Store<br>
                        : {{ $admin->no_hp }}<br>
                        : {{ $admin->alamat }}, <br>
                            {{ $city_admin->nama_kota }}, {{ $prov_admin->nama_provinsi }}, Indonesia
                    </address>
                    <address>
                        <br>
                        : {{ $pembayaran->pesanan->pelanggan->name }}<br>
                        : {{ $pembayaran->pesanan->pelanggan->no_hp }}<br>
                        : {{ $pembayaran->pesanan->alamat_kirim }}, <br>
                            {{ $city->nama_kota }}, {{ $prov->nama_provinsi }} Indonesia
                    </address>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-1"></div>
    </div>
</div><!-- container -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
</body>
</html>
