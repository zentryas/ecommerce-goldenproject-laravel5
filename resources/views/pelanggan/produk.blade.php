@extends('layouts.app')
@section('title','Daftar Produk')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-5 mt-5">
			@guest 
			<div class="how-it-works d-flex mt-3">
				<div class="step">
					<span class="number"><span>1</span></span>
					<span class="caption" style="font-size: 12px;">Login </span>
				</div>
				<div class="step">
					<span class="number"><span>2</span></span>
					<span class="caption" style="font-size: 12px;">Pilih Produk</span>
				</div>
				<div class="step">
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
			@else
			<div class="how-it-works d-flex mt-3">
				<div class="step1">
					<span class="number"><span>1</span></span>
					<span class="caption" style="font-size: 12px;">Login </span>
				</div>
				<div class="step">
					<span class="number"><span>2</span></span>
					<span class="caption" style="font-size: 12px;">Pilih Produk</span>
				</div>
				<div class="step">
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
			@endguest
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-3 mb-5">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
			<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Branded</a>
			<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Sport</a>
			<a class="nav-link" id="v-pills-sneakers-tab" data-toggle="pill" href="#v-pills-sneakers" role="tab" aria-controls="v-pills-sneakers" aria-selected="false">Sneakers</a>
			</div>
		</div>
		<div class="col-9 mb-5">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="row">
						@foreach($produk as $data)
						<div class="col-md-4 py-3 px-3">
							<div class="card">
								<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">{{ $data->nama_produk }}</h5>
										<small>{{ $data->created_at->diffForHumans() }}</small>
										</div>
										<p class="mb-1">Rp. {{ number_format($data->harga_jual) }}</p>
									</a>
								</div>
								<div class="card-body">
									<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-warning btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="row">
						@foreach($kat_1 as $data)
						<div class="col-md-4 py-3 px-3">
							<div class="card">
								<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">{{ $data->nama_produk }}</h5>
										<small>{{ $data->created_at->diffForHumans() }}</small>
										</div>
										<p class="mb-1">Rp. {{ number_format($data->harga_jual) }}</p>
									</a>
								</div>
								<div class="card-body">
									<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-warning btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<div class="row">
						@foreach($kat_2 as $data)
						<div class="col-md-4 py-3 px-3">
							<div class="card">
								<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">{{ $data->nama_produk }}</h5>
										<small>{{ $data->created_at->diffForHumans() }}</small>
										</div>
										<p class="mb-1">Rp. {{ number_format($data->harga_jual) }}</p>
									</a>
								</div>
								<div class="card-body">
									<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-warning btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-sneakers" role="tabpanel" aria-labelledby="v-pills-sneakers-tab">
					<div class="row">
						@foreach($kat_3 as $data)
						<div class="col-md-4 py-3 px-3">
							<div class="card">
								<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">
										<div class="d-flex w-100 justify-content-between">
										<h5 class="mb-1">{{ $data->nama_produk }}</h5>
										<small>{{ $data->created_at->diffForHumans() }}</small>
										</div>
										<p class="mb-1">Rp. {{ number_format($data->harga_jual) }}</p>
									</a>
								</div>
								<div class="card-body">
									<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-warning btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop