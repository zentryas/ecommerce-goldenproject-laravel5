<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Toko Aneka Sandal & Sepatu" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('crovex') }}/images/logo-new.png">
        <!-- App css -->
        <link href="{{ asset('crovex') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('crovex') }}/css/jquery-ui.min.css" rel="stylesheet">
        <link href="{{ asset('crovex') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('crovex') }}/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('crovex') }}/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">

                            @yield('konten')

                        </div><!--end card-->
                    </div><!--end auth-page-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        <!-- jQuery  -->
        <script src="{{ asset('crovex') }}/js/jquery.min.js"></script>
        <script src="{{ asset('crovex') }}/js/jquery-ui.min.js"></script>
        <script src="{{ asset('crovex') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('crovex') }}/js/metismenu.min.js"></script>
        <script src="{{ asset('crovex') }}/js/waves.js"></script>
        <script src="{{ asset('crovex') }}/js/feather.min.js"></script>
        <script src="{{ asset('crovex') }}/js/jquery.slimscroll.min.js"></script>        

        <!-- App js -->
        <script src="{{ asset('crovex') }}/js/app.js"></script>
        <script>
            function cek2pass() 
            {
                var x = document.getElementById("password");
                var xc = document.getElementById("password-confirm");
                if (x.type === "password" && xc.type === "password")
                {
                    x.type   = "text";
                    xc.type  = "text";
                } else {
                    x.type   = "password";
                    xc.type  = "password";
                }
            }
        </script>
        <script>
            function cek1pass() 
            {
                var x = document.getElementById("password");
                if (x.type === "password")
                {
                    x.type   = "text";
                } else {
                    x.type   = "password";
                }
            }
        </script>
    </body>
</html>