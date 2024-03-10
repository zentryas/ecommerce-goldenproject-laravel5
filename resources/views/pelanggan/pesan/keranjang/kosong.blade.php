@extends('layouts.app')
@section('title','Keranjang')
@section('content')
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-lg-8">
			<h3><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h3>
			<div class="table-responsive mt-3 mb-5">
				<table class="table table-bordered text-center">
					<tr>
						<th>No</th>
						<th>Info Produk</th>
						<th>Jumlah </th>
						<th>Ukuran</th>
						<th>Harga Belanja</th>
						<th>Aksi</th>
					</tr>
					<tbody>
						<tr>
							<td colspan="7">Maaf! Anda belum mempunyai produk dikeranjang</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-4 card-right">
			<a href="/produk" class="site-btn sb-dark">Lanjutkan belanja</a>
		</div>
	</div>
</div>
@stop