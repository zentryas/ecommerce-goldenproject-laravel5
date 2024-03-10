@extends('layouts.app')
@section('title','Checkout Pemesanan')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5">
				<div class="how-it-works d-flex mt-3">
					<div class="step1">
						<span class="number"><span>1</span></span>
						<span class="caption" style="font-size: 12px;">Login </span>
					</div>
					<div class="step1">
						<span class="number"><span>2</span></span>
						<span class="caption" style="font-size: 12px;">Pilih Produk</span>
					</div>
					<div class="step1">
						<span class="number"><span>3</span></span>
						<span class="caption" style="font-size: 12px;">Tentukan Ukuran & Jumlah</span>
					</div>
					<div class="step1">
						<span class="number"><span>4</span></span>
						<span class="caption" style="font-size: 12px;">Keranjang</span>
					</div>
					<div class="step">
						<span class="number"><span>5</span></span>
						<span class="caption" style="font-size: 12px;">Checkout</span>
					</div>
					<div class="step">
						<span class="number"><span>6</span></span>
						<span class="caption" style="font-size: 12px;">Pembayaran</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container mb-5">
			<div class="card">
				<div class="card-body">
				<form class="form-horizontal checkout-form" onsubmit="return submitForm();">
					<div class="row">
						<div class="col-lg-7 col-md-7">
							<div class="cf-title">Identitas Pembeli</div>
							<div class="container mb-3">
								<div class="row justify-content-center">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<label for="" class="text-right">Nama Lengkap</label>
												<input type="text" class="form-control" value="{{ $pesanan->pelanggan->name }}" readonly>
												<label for="" class="text-right">Email</label>
												<input type="text" class="form-control" value="{{ $pesanan->pelanggan->email }}" readonly>
											</div>
											<div class="col-md-6">
												<label for="" class="text-right">Nomor HP</label>
												<input type="text" class="form-control" value="{{ $pesanan->pelanggan->no_hp }}" readonly>
												<label for="" class="text-right">Jenis Kelamin</label>
												<input type="text" class="form-control" value="{{ $pesanan->pelanggan->jenis_kelamin }}" readonly>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="cf-title">Detail Pengiriman</div>
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Provinsi Tujuan</label>
														<select name="province_destination" class="form-control drop-edit" id="province_destination">
															<option>--Pilih Provinsi--</option>
															@foreach ($provinces as $province => $value)
															<option value="{{ $province }}">{{ $value }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="">Kota Tujuan</label>
														<select name="city_destination" class="form-control drop-edit" id="city_destination">
															<option>--Pilih Kota--</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="">Alamat Lengkap</label>
												<textarea name="alamat_kirim" class="form-control" id="alamat_kirim" cols="30" rows="4"></textarea>
												<small class="form-text text-danger"><i class="fa fa-info-circle"></i> Contoh : Nganti RT 01 RW 07 Sendangadi, Kec. Mlati / Jl. Jendral Soedirman No.12</small>
											</div>
											<div class="form-group">
												@php
													$total = 0;
												@endphp
												@foreach($pesanan_details as $data)
													@php
														$total += $data->jumlah_beli;
													@endphp
												@endforeach
												
												@if( $total <= "2")
													<input type="hidden" name="weight" id="weight" class="form-control" value="1000" readonly>
												@elseif( $total >= "2" && $total <= "4")
													<input type="hidden" name="weight" id="weight" class="form-control" value="2000" readonly>
												@elseif( $total >= "4" && $total <= "6")
													<input type="hidden" name="weight" id="weight" class="form-control" value="3000" readonly>
												@elseif( $total >= "6" && $total <= "8")
													<input type="hidden" name="weight" id="weight" class="form-control" value="4000" readonly>
												@elseif( $total >= "8" && $total <= "10")
													<input type="hidden" name="weight" id="weight" class="form-control" value="5000" readonly>
												@else
												    <input type="hidden" name="weight" id="weight" class="form-control" value="6000" readonly>
												@endif
											</div>
											<div class="form-group">
												<label for="">Kurir</label>
												<select class="form-control drop-edit" name="kurir" id="kurir">
													<option>--Pilih Kurir--</option>
													@foreach ($couriers as $kurir => $value)
													<option name="kurir" value="{{ $kurir }}" id="kurir">{{ $value }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="">Paket Kurir</label>
												<select class="form-control drop-edit" name="service" id="service" onchange="total()">
													<option>--Pilih Paket Kurir--</option>
												</select>
											</div>
										</div>
									</div>
								</div>

							<input type="hidden" name="pesanan_id" id="pesanan_id" value="{{ $pesanan->id }}">
							<span id="total_pembayaran"></span>
							<span id="harga_paket"></span>
							<span id="durasi_kirim"></span>
							<span id="tipe_paket"></span>

						</div>
						<div class="col-lg-5 col-md-5">
							<div class="card py-2 px-2">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-3">{{ $pesanan->kode_pesanan }}</h4>
									<div class="table-responsive shopping-cart">
										<table class="table mb-0">
											<thead>
												<tr>
													<th>Product</th>
													<th>Qty</th>  
													<th>Size</th>                                                      
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pesanan_details as $pesanan_detail)
												<tr>
													<td>
														<img src="{{ asset($pesanan_detail->produk->gambar_produk) }}" alt="" height="52">
														<p class="d-inline-block align-middle mb-0 product-name">{{ $pesanan_detail->produk->nama_produk }}</p>  <br>
														<b>Rp. {{ number_format($pesanan_detail->produk->harga_jual) }}</b>
													</td>
													<td>x {{ $pesanan_detail->jumlah_beli }}</td>
													<td>
														@if($pesanan_detail->ukuran == "stok1")
															<span class="badge badge-info badge-pill">39</span>
														@elseif($pesanan_detail->ukuran == "stok2")
															<span class="badge badge-info badge-pill">40</span>
														@elseif($pesanan_detail->ukuran == "stok3")
															<span class="badge badge-info badge-pill">41</span>
														@elseif($pesanan_detail->ukuran == "stok4")
															<span class="badge badge-info badge-pill">42</span>
														@elseif($pesanan_detail->ukuran == "stok5")
															<span class="badge badge-info badge-pill">43</span>
														@endif
													</td>
													<td>Rp. {{ number_format($pesanan_detail->produk->harga_jual*$pesanan_detail->jumlah_beli) }}</td>                                                        
												</tr> 
												@endforeach
												<tr>
													<td>
														<h6>Total Belanja :</h6>
													</td>
													<td></td><td></td>
													<td class="text-dark"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
												</tr>                                                    
											</tbody>
										</table>
									</div><!--end re-table-->
									<div class="total-payment">
										<table class="table mb-0">
										<input type="hidden" id="totalhargakeseluruhan" value="{{ $pesanan->total_harga }}">
											<tbody>
												<tr>
													<td>Berat (kg)</td>
													<td>
														@php
															$total = 0;
														@endphp
														@foreach($pesanan_details as $data)
															@php
																$total += $data->jumlah_beli;
															@endphp
														@endforeach
														
														@if( $total <= "2")
															<span>1 kg</span>
														@elseif( $total >= "2" && $total <= "4")
															<span>2 kg</span>
														@elseif( $total >= "4" && $total <= "6")
															<span>3 kg</span>
														@elseif( $total >= "6" && $total <= "8")
															<span>4 kg</span>
														@elseif( $total >= "8" && $total <= "10")
															<span>5 kg</span>
														@else
														    <span>6 kg</span>
														@endif
													</td>
												</tr>
												<tr>
													<td class="payment-title">Tipe Paket</td>
													<td><span id="paket"></span></td>
												</tr>
												<tr>
													<td class="payment-title">Durasi Kirim</td>
													<td>
														<span id="lama_pengiriman"></span>
													</td>
												</tr>
												<tr>
													<td class="payment-title">Ongkir</td>
													<td><span id="hargapaket"></span></td>
												</tr>
												<tr>
													<td class="payment-title">Total Pembayaran</td>
													<td class="text-dark"><strong><span id="totalHarga"></span></strong></td>
												</tr>
											</tbody>
										</table><!--end table-->
									</div><!--end total-payment-->
								</div><!--end card-body-->
							</div>
							<button id="submit" class="btn btn-primary mt-3" disabled>Bayar sekarang!</button>
							<button type="button" class="btn btn-danger mt-3 ml-3" data-toggle="modal" data-target="#batalkan">Batalkan</button>
						</div>
					</div>		
				</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="modal fade" id="batalkan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="/batalkan-pesanan/{{ $pesanan->id }}" method="GET">
            @csrf
              <div class="modal-body text-center">
                    <p>Apakah anda yakin akan membatalkan pesanan dengan kode <span class="text-danger">{{ $pesanan->kode_pesanan }}</span>?</p>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
              </div>
            </form
        </div>
      </div>
    </div>

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
					window.location.href = "https://goldenfacestore.online/riwayat";
                },
                // Optional
                onPending: function (result) {
                    window.location.href = "https://goldenfacestore.online/riwayat";
                },
                // Optional
                onError: function (result) {
                   window.location.href="https://goldenfacestore.online/riwayat";
                }
            });
        });
        return false;
    }
    </script>

	<!-- checkout section end -->
	<script>
		function total() {
			let totalhargabarang = document.getElementById("totalhargakeseluruhan").value;
			let t = document.getElementById("service").value;
			var convert = t.split(",");

			let hargafix = totalhargabarang;
			let hargapaket = convert[1];
			let paket = convert[0];
			let etd = convert[2];
			let deskripsi = convert[3];

			let totalkeseluruhan = parseInt(hargafix) + parseInt(hargapaket);
			// console.log(totalkeseluruhan);

			$('#total_pembayaran').empty();
			$('#total_pembayaran').append(
				'<input type="hidden" id="total_pembayaran" name="total_pembayaran" value="'+totalkeseluruhan+'">'
			);
			$('#harga_paket').empty();
			$('#harga_paket').append(
				'<input type="hidden" id="harga_paket" name="harga_paket" value="'+hargapaket+'">'
			);
			$('#durasi_kirim').empty();
			$('#durasi_kirim').append(
				'<input type="hidden" id="durasi_kirim" name="durasi_kirim" value="'+etd+'">'
			);
			$('#tipe_paket').empty();
			$('#tipe_paket').append(
				'<input type="hidden" id="tipe_paket" name="tipe_paket" value="'+paket+' - '+deskripsi+'">'
			);
			
			$("#submit").attr("disabled", false);

			document.getElementById("totalHarga").innerHTML = "Rp. " + totalkeseluruhan;
			document.getElementById("paket").innerHTML = paket + " - " + deskripsi;
			document.getElementById("hargapaket").innerHTML = "Rp. " + hargapaket;
			document.getElementById("lama_pengiriman").innerHTML = etd;
		}
	</script>
@stop
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function() {
		$('select[name="province_origin"]').on('change', function(){
			let provinceId = $(this).val();
			if(provinceId) {
				jQuery.ajax({
					url: '/province/'+provinceId+'/cities',
					type:"GET",
					dataType:"json",
					success:function(data) {
						$('select[name="city_origin"]').empty();
						$.each(data, function(key, value){
							$('select[name="city_origin"]').append('<option value="'+ key +'">' + value + '</option>');
						});
					},
				});
			} else {
				$('select[name="city_origin"]').empty();
			}
		});
		
		$('select[name="province_destination"]').on('change', function() {
			let provinceId = $(this).val();
			if (provinceId) {
				jQuery.ajax({
					url:'/province/'+provinceId+'/cities',
					type:"GET",
					dataType:"json",
					success:function(data) {
						$('select[name="city_destination"]').empty();
						$.each(data, function (key, value) {
						$('select[name="city_destination"]').append('<option value="'+key+'">'+value+'</option>');
						});
					},
				});
			} else {
				$('select[name="city_destination"]').empty();
			}
		});

		$(document).ready(function () {
			$('#kurir').on('change', function () {
				let output = '';
				let weight = $('#weight').val();
				let tujuan = $('#city_destination').val();
				var token = '{{ csrf_token() }}';
				let kurir = $('#kurir').val();

				if (kurir) {
					$.ajax({
						url: '/postservice',
						type: 'POST',
						data: {
							'_token': token,
							'weight': weight,
							'tujuan': tujuan,
							'kurir': kurir
						},
						success: function (respons) {
							$('#service').empty();
							let length = respons.length;
							$('#service').append('<option value="">--Pilih Paket Kurir--</option>');
							for (let i = 0; i < length; i++) {
								let etd = respons[i]['cost'][0]['etd'];
								let harga = respons[i]['cost'][0]['value'];
								let paket = respons[i]['service'];
								let deskripsi = respons[i]['description'];
								// $('#service').append('<option id="service" value="'+ respons[i]['service'] + " " + respons[i]['cost'][0]['value'] + " " + respons[i]['cost'][0]['etd'] +'">'+respons[i]['service'] + " " + respons[i]['cost'][0]['value'] + " " + respons[i]['cost'][0]['etd']+'</option>');
								$('#service').append(
									'<option id="service" name="service" value="' +
									paket + "," + harga + "," + etd + "," + deskripsi + '">'+paket+' - '+deskripsi+'</option>');
							};
						},
					});
				}
			});
		});
	});
</script>
