@extends('layouts.app')
@section('title','Bursaneka Store | Panduan')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
		<div class="container">
			<h4>Halaman Panduan</h4>
			<div class="site-pagination">
				<a href="/">Home</a> /
				<a href="">Panduan</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

    <!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Informasi</h2>
						<ul class="category-menu">
							<li><a href="#Panduan1">Cara membuat akun customer</a></li>
                            <li><a href="#Panduan2">Cara melakukan login akun</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-8  order-1 order-lg-2 mb-5 mb-lg-0">
                    <div id="Panduan1">
                        <h5 class="mt-5 mb-3 text-center">---Cara membuat akun customer---</h5>
                        <div class="text-center"><img src="{{ asset('template_users/img/register.jpg') }}" alt="" width="80%"></div>
                        <ol class="ml-3">
                            <li>Silahkan akses halaman <a href="/register">Register</a></li>
                            <li>Kemudian masukan data pribadi (Nama lengkap, nomor hp dan jenis kelamin) dan data login (email dan password)</li>
                            <li>Selanjutnya menekan tombol register</li>
                        </ol>
                    </div>
                    <div id="Panduan2">
                        <h5 class="mt-5 mb-3 text-center">---Cara login akun---</h5>
                        <div class="text-center"><img src="{{ asset('template_users/img/login.jpg') }}" alt="" width="80%" class="mb-3"></div>
                        <ol class="ml-3">
                            <li>Silahkan akses halaman <a href="/login">Login</a></li>
                            <li>Kemudian masukan data login (email dan password)</li>
                            <li>Selanjutnya menekan tombol login</li>
                        </ol>
                    </div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

@endsection