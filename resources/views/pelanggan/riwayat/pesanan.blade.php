@extends('layouts.app')
@section('title','Riwayat Pesanan Anda')
@section('content')
<!-- Page info end -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="how-it-works d-flex mt-3">
                    <div class="step1">
                        <span class="number"><span>1</span></span>
                        <span class="caption" style="font-size: 12px;">Belum Bayar </span>
                    </div>

                    @if( $pembayaran->pesanan->status_pesanan == "3")
                        <div class="step1">
                            <span class="number"><span>2</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikemas</span>
                        </div>
                    @elseif ( $pembayaran->pesanan->status_pesanan == "4")
                        <div class="step1">
                            <span class="number"><span>2</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikemas</span>
                        </div>
                    @elseif ( $pembayaran->pesanan->status_pesanan == "5")
                        <div class="step1">
                            <span class="number"><span>2</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikemas</span>
                        </div>
                    @else
                        <div class="step">
                            <span class="number"><span>2</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikemas</span>
                        </div>
                    @endif
                    
                    @if( $pembayaran->pesanan->status_pesanan == "4")
                        <div class="step1">
                            <span class="number"><span>3</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikirim</span>
                        </div>
                    @elseif( $pembayaran->pesanan->status_pesanan == "5")
                        <div class="step1">
                            <span class="number"><span>3</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikirim</span>
                        </div>
                    @else
                        <div class="step">
                            <span class="number"><span>3</span></span>
                            <span class="caption" style="font-size: 12px;">Sedang dikirim</span>
                        </div>
                    @endif
                    
                    @if( $pembayaran->pesanan->status_pesanan == "5")
                        <div class="step1">
                            <span class="number"><span>4</span></span>
                            <span class="caption" style="font-size: 12px;">Sampai</span>
                        </div>
                        <div class="step1">
                            <span class="number"><span>5</span></span>
                            <span class="caption" style="font-size: 12px;">Post Testimoni</span>
                        </div>
                    @else
                        <div class="step">
                            <span class="number"><span>4</span></span>
                            <span class="caption" style="font-size: 12px;">Sampai</span>
                        </div>
                        <div class="step">
                            <span class="number"><span>5</span></span>
                            <span class="caption" style="font-size: 12px;">Post Testimoni</span>
                        </div>
                    @endif                
                </div>
            </div>
        </div>
    </div>

	<!-- cart section end -->
	<section class="cart-section">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6 col-6">
                    <address>
                        <strong>Identitas Pengirim</strong><br>
                        Golden Face Store<br>
                        {{ $admin->no_hp }}<br>
                        {{ $admin->alamat }}<br>
                        {{ $city_admin->nama_kota }}, {{ $prov_admin->nama_provinsi }}, Indonesia
                    </address>
                </div>
                <div class="col-md-6 col-6 text-md-right text-right">
                    <address>
                        <strong>Identitas Penerima</strong><br>
                        {{ $pembayaran->pesanan->pelanggan->name }}<br>
                        {{ $pembayaran->pesanan->pelanggan->no_hp }}<br>
                        {{ $pembayaran->pesanan->alamat_kirim }}<br>
                        {{ $city->nama_kota }}, {{ $prov->nama_provinsi }} Indonesia
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-6">
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
                <div class="col-md-6 col-6 text-md-right text-right">
                <address>
                    <strong>Tanggal Pemesanan</strong><br>
                    {{ date("d/m/Y", strtotime($pembayaran->pesanan->tgl_pesanan)) }}<br>
                    <strong>Kode Pemesanan</strong><br>
                    {{ $pembayaran->pesanan->kode_pesanan}} <br>
                    @if( $pembayaran->pesanan->status_pesanan == "4")
                        <strong>Nomor Resi</strong><br>
                        <span class="text-success">{{ $pembayaran->pesanan->nomor_resi }}</span>
                    @endif
                </address>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th data-width="40">No</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Banyak</th>
                                    <th class="text-center">Ukuran</th>
                                    <th class="text-right">Totals</th>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pesanan_details as $data)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td class="text-center"><img src="{{ asset($data->produk->gambar_produk) }}" alt="" width="50"></td>
                                    <td>{{ $data->produk->nama_produk }}</td>
                                    <td class="text-center">Rp. {{ number_format($data->produk->harga_jual) }}</td>
                                    <td class="text-center">{{ $data->jumlah_beli }}</td>
                                    <td class="text-center">
                                        
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
                                    </td>
                                    <td class="text-right">Rp. {{ number_format($data->jumlah_harga) }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value">Rp. {{ number_format($pembayaran->pesanan->total_harga) }}</div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Biaya Ongkir</div>
                                    <div class="invoice-detail-value">Rp. {{ number_format($pembayaran->pesanan->biaya_ongkir) }}</div>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Harga</div>
                                    <div class="invoice-detail-value invoice-detail-value-md">Rp. {{ number_format($pembayaran->total_pembayaran) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <p>Info Pembayaran : {{ $pembayaran->status_pembayaran}}</p> <br>
                            @if ($pembayaran->status_pembayaran == 'pending')
                                <button class="btn btn-success btn-sm" onclick="snap.pay('{{ $pembayaran->snap_token }}')">Selesaikan pembayaran!</button>
                            @endif
            
                            @if( $pembayaran->pesanan->status_pesanan == "4")
                                <a href="#" data-toggle="modal" data-target="#post{{$pembayaran->id}}" class="btn btn-success btn-sm">Sudah sampai & post testimonial</a>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="post{{$pembayaran->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pesanan {{ $pembayaran->pesanan->kode_pesanan }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/riwayat/pesanan/{{ $pembayaran->pesanan->id }}/post" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
                                                    <label>Post Testimonial</label>
                                                    <textarea name="testimonial" class="form-control" id="" cols="10" rows="5"></textarea>
                                                </div>                        
                                            
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<!-- cart section end -->

    <script

        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
            
    </script>

    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}">
    </script>

    <script>
    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('pembayaran.lunas') }}",
        {
            _method: 'POST',
            _token                  : '{{ csrf_token() }}',
			pesanan_id              : $('input#pesanan_id').val(),
            total_pembayaran        : $('input#total_pembayaran').val(),
			province_destination    : $('select#province_destination').val(),
			city_destination        : $('select#city_destination').val(),
			courier_id     			: $('select#kurir').val(),
			harga_paket     		: $('input#harga_paket').val(),
			tipe_paket    			: $('input#tipe_paket').val(),
			kurir 					: $('select#kurir').val(),
			weight    				: $('input#weight').val(),
			durasi_kirim     		: $('input#durasi_kirim').val(),
			alamat_kirim     		: $('textarea#alamat_kirim').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
					window.location.href = "http://127.0.0.1:8000/riwayat";
                },
                // Optional
                onPending: function (result) {
                    window.location.href = "http://127.0.0.1:8000/riwayat";
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });
        return false;
    }
    </script>
@stop
