@extends('layouts.app')
@section('title','Keranjang')
@section('content')
<div class="container mb-5">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12 mb-5 mt-5">
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
				<div class="step">
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
		</div><!--end col-->
	</div>
	<!-- end page title end breadcrumb -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<h4 class="header-title mt-0"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h4>
							<p>Tanggal Pesanan : {{ date("d/m/Y", strtotime($pesanan->tgl_pesanan)) }}</p>
						</div>
						<div class="col-md-6">
							<h5 class="mb-4 text-muted text-right"><span class="text-success">{{ $pesanan->kode_pesanan }}</span></h5>
						</div>
					</div>
					<div class="table-responsive shopping-cart">
						<table class="table mb-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Product</th>
									<th>Price</th>
									<th>Size</th>   
									<th>Quantity</th>                                                     
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php $no = 1; ?>
							@foreach($pesanan_details as $pesanan_detail)
								<tr>
									<td>{{ $no++ }}</td>
									<td>
										<img src="{{ asset($pesanan_detail->produk->gambar_produk) }}" alt="" height="52">
										<p class="d-inline-block align-middle mb-0">
											<a href="" class="d-inline-block align-middle mb-0 product-name">{{ $pesanan_detail->produk->nama_produk }}</a> 
											<br>
											<span class="text-muted font-13">Rp. {{ number_format($pesanan_detail->produk->harga_jual) }}</span> 
										</p>
									</td>
									<td>Rp. {{ number_format($pesanan_detail->produk->harga_jual) }}</td>
									<td>
										@if($pesanan_detail->ukuran == "stok1")
											<span class="badge badge-success badge-pill">39</span>
										@elseif($pesanan_detail->ukuran == "stok2")
											<span class="badge badge-success badge-pill">40</span>
										@elseif($pesanan_detail->ukuran == "stok3")
											<span class="badge badge-success badge-pill">41</span>
										@elseif($pesanan_detail->ukuran == "stok4")
											<span class="badge badge-success badge-pill">42</span>
										@elseif($pesanan_detail->ukuran == "stok5")
											<span class="badge badge-success badge-pill">43</span>
										@endif
									</td>
									<td>
										{{ $pesanan_detail->jumlah_beli }} <span>pcs</span>
									</td>
									<td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
									<td align="center">
										<a href="#" class="delete" pesananDetail-id="{{ $pesanan_detail->id }}" pesananDetail-nama="{{ $pesanan_detail->produk->nama_produk }}"><i class="fa fa-trash text-danger"></i></a>
									</td>
								</tr>   
								@endforeach                                          
							</tbody>
						</table>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-6 align-self-center">
							
						</div><!--end col--> 
						<div class="col-md-6">
							<div class="total-payment">
								<h4 class="header-title">Total Payment</h4>
								<table class="table">
									<tbody>
										<tr>
											<td class="payment-title">Subtotal</td>
											<td>Rp. {{ number_format($pesanan->total_harga) }}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="mt-4">
								<div class="row">
									<div class="col-6">
										<a href="/produk" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left mr-1"></i> Lanjutkan belanja</a>
									</div>                                                        
									<div class="col-6 text-right">
										<a href="/keranjang/checkout" class="btn btn-warning btn-sm">Checkout <i class="fa fa-arrow-circle-right ml-1"></i></a>
									</div> 
								</div>
							</div>
						</div><!--end col--> 
					</div><!--end row--> 
				</div><!--end card-->
			</div><!--end card-body-->
		</div><!--end col-->
	</div><!--end row--> 

</div><!-- container -->	
@stop
@section('sweetAlert')
    <script type="text/javascript">
        $('.delete').click(function()
        {
            var id = $(this).attr('pesananDetail-id');
            var nama = $(this).attr('pesananDetail-nama');
            swal({
              title: "Apakah anda yakin?",
              text: "Menghapus data pesanan "+nama+"!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/keranjang/"+id+"/hapus";
              }
            });
        });
    </script>
@stop
