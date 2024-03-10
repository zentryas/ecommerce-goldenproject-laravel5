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
    <title>@yield('title') | Golden Face Store</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('crovex') }}/images/logo-new.png">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- TOASTER -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('crovex')}}/images/logo-new.png" alt="" width="30"> <b>Golden Face Store</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Daftar Produk</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="/panduan">Panduan</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Daftar Produk</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="/panduan">Panduan</a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php
                                        $pesanans = App\Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan', '!=',0)->count();
                                    ?>
                                    <a class="dropdown-item" href="/riwayat">Riwayat Pesanan <span class="badge badge-info badge-pill">{{ $pesanans }}</span></a>
                                    <a class="dropdown-item" href="/users/logout">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/keranjang">
                                    <i class="fa fa-shopping-cart"></i>
                                    <?php
                                        $pesanan_utama = \App\Pesanan::where('pelanggan_id', Auth::user()->id)->where('status_pesanan',0)->first();
                                        if(!empty($pesanan_utama))
                                            {
                                                $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                            }
                                    ?>
                                    @if(!empty($notif))
                                        <span class="badge badge-info">{{ $notif }}</span>
                                    @else
                                        <span class="badge badge-danger">0</span>
                                    @endif
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget text-justify">
								<h6>Golden Face Store</h6>
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Daftar Produk</a></li>
                                </ul>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget text-justify">
                            <h6>Pembayaran</h6>
                                <ul>
                                    <li><img src="{{ asset('img')}}/BCA.png" alt="" width="120"></li>
                                    <li><img src="{{ asset('img')}}/BNI.jpg" alt="" width="120"></li>
                                    <li><img src="{{ asset('img')}}/Mandiri.jpg" alt="" width="120"></li>
                                    <li><img src="{{ asset('img')}}/Permata.png" alt="" width="120"></li>
                                </ul>
							</div>
						</div>					
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget text-justify">
								<h6>Alamat Toko Kami</h6>
                                <p>Gg. Megatruh, Karang Wuni, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
                            </div>
						</div>	
						<p class="mt-50 mx-auto footer-text col-lg-12">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Golden Face Store</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>											
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('sweetAlert')
    <script type="text/javascript">
        @if(Session::has('sukses'))
            toastr.success("{{Session::get('sukses')}}", "Sukses")
        @endif
		@if(Session::has('maaf'))
			toastr.warning("{{Session::get('maaf')}}", "Peringatan")
        @endif
    </script>
    <script type="text/javascript">
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    </script>
</body>
</html>
