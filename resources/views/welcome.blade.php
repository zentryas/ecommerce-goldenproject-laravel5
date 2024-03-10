@extends('layouts.app')
@section('title','Home')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
		<img class="d-block w-100" src="{{ asset('img')}}/banner-1.jpg" alt="First slide">
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="{{ asset('img')}}/banner-2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="{{ asset('img')}}/banner-3.jpg" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="container py-5 mt-5 mb-5" style="border: 1px solid red;">
	<h5 class="text-center mt-3">ALASAN PELANGGAN MEMILIH TOKO GOLDEN FACE STORE</h5>
	<p class="text-center mb-5">Alasan tersebut antara lain:</p>
	<div class="row">
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-stack-overflow"></i></span>
			<h5 class="mt-3">Membuka Reseler</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Silahkan yang mau membeli produk dan dijual kembali, kami menyediakan harga khusus</p>
		</div>
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-camera-retro"></i></span>
			<h5 class="mt-3">Real Picture</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Gambar produk yang kami tawarkan merupakan gambar asli dari produk kami, maka jangan khawatir gambar mengambil dari google</p>
		</div>
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-file-image-o"></i></span>
			<h5 class="mt-3">Produk Kekinian</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Produk yang kami tawarkan selalu update dengan perkembangan fashion, jangan khawatir belanja di sini</p>
		</div>
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-shopping-cart"></i></span>
			<h5 class="mt-3">Belanja Online</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Dimudahkan dengan pembelian secara online, tanpa perlu datang ke lokasi toko anda dapat memesan produk</p>
		</div>
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-shield"></i></span>
			<h5 class="mt-3">Aman dan Terpercaya</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Keamanan terhadap identitas pembeli dan Terpercaya terhadap produk-produk yang kami jual. Jangan sampai tertipu dengan harga murah dengan kualitas yang memuaskan</p>
		</div>
		<div class="col-lg-4 text-center">
			<span style="font-size: 88px;"><i class="fa fa-thumbs-up"></i></span>
			<h5 class="mt-3">Produk Berkualitas</h5>
			<p style="font-size: 12px;" class="mt-2 px-3">Tentunya produk yang kami tawarkan merupakan produk pilihan yang mengedepankan dengan kualitas</p>
		</div>
	</div>
</div>

<div class="container">
	<h5 class="text-center mt-5">PRODUK KAMI</h5>
	<p class="text-center">Preview produk berdasarkan kategori, antara lain:</p>
	<div class="row justify-content-center">
		<div class="col-md-6 text-center">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Branded</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Sport</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-sneakers-tab" data-toggle="pill" href="#pills-sneakers" role="tab" aria-controls="pills-sneakers" aria-selected="false">Sneakers</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<div class="row">
				@foreach($produk as $data)
				<div class="col-md-3 py-3 px-3">
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
		<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<div class="row">
				@foreach($kat_1 as $data)
				<div class="col-md-3 py-3 px-3">
					<div class="card">
						<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $data->nama_produk }}</h5>
							<h5 class="text-success">Rp. {{ number_format($data->harga_jual) }}</h5>
							<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
			<div class="row">
				@foreach($kat_2 as $data)
				<div class="col-md-3 py-3 px-3">
					<div class="card">
						<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $data->nama_produk }}</h5>
							<h5 class="text-success">Rp. {{ number_format($data->harga_jual) }}</h5>
							<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="tab-pane fade" id="pills-sneakers" role="tabpanel" aria-labelledby="pills-sneakers-tab">
			<div class="row">
				@foreach($kat_3 as $data)
				<div class="col-md-3 py-3 px-3">
					<div class="card">
						<img class="card-img-top" src="{{ $data->gambar_produk }}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $data->nama_produk }}</h5>
							<h5 class="text-success">Rp. {{ number_format($data->harga_jual) }}</h5>
							<a href="/tentukan-ukuran-&-jumlah/{{ $data->id }}" class="btn btn-primary btn-sm"> <i class="fa fa-shopping-cart"></i> ADD TO CART</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-image: linear-gradient(to left, rgba(0,0,0,0.1), rgb(0,0,0.6)),url({{ asset('img')}}/banner-3.jpg); background-size: cover; height: 100%;">
	<h5 class="text-center text-white pt-5">Tentang KAMI</h5>
	<p class="text-center text-white">Tentang Toko Golden Face Store, antara lain:</p>
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent text-white">
                <div class="card-body text-justify">
                <p>
                    <span class="ml-5">Kami</span> hadir untuk menjawab kebutuhan masyarakat modern akan kemudahan berbelanja, kapanpun dan dimanapun Anda menginginkannya. Kami berusaha membantu Anda dalam bertransaksi dan menikmati gaya hidup modern yang praktis melalui berbagai produk eksklusif berkualitas premium dengan harga yang kompetitif. Kami berkomitmen untuk memberikan pengalaman belanja online yang aman dan nyaman, transaksi dengan proses yang cepat dan mudah, untuk kemudahan Anda, Kami juga menghadirkan fitur pengambilan langsung di beberapa pick up point yang berlokasi di alamat toko kami serta beragam pilihan fasilitas pembayaran yang lengkap, mudah dan aman. Kami memberikan layanan terbaik dalam belanja online. Selamat menikmati pengalaman berbelanja yang menyenangkan!
				</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop