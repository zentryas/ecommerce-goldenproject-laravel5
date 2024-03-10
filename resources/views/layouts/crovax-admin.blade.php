<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | Golden Face Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Golden Face Store" name="description" />
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
        <!-- DataTables -->
        <link href="{{ asset('crovex') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('crovex') }}/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('crovex') }}/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        <!-- TOASTER -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{ asset('crovex/dropify/css/dropify.css')}}">
    </head>
    <body>
        
         <!-- Top Bar Start -->
         <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/admin" class="logo">
                    <span>
                        <img src="{{ asset('crovex') }}/images/logo-new.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <b>GOLDEN FACE STORE</b>
                    </span>
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">  
                @include('layouts.sisipan.navbar')
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            @include('layouts.sisipan.sidebar')
        </div>
        <!-- end left-sidenav-->

        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content">

                @yield('konten')

                <footer class="footer text-center text-sm-left">
                    &copy; 2023 Golden Face Store
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="{{ asset('crovex') }}/js/jquery.min.js"></script>
        <script src="{{ asset('crovex') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('crovex') }}/js/metismenu.min.js"></script>
        <script src="{{ asset('crovex') }}/js/waves.js"></script>
        <script src="{{ asset('crovex') }}/js/feather.min.js"></script>
        <script src="{{ asset('crovex') }}/js/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('crovex') }}/js/jquery-ui.min.js"></script>

        <!-- App js -->
        <script src="{{ asset('crovex') }}/js/app.js"></script>
        
        <!-- Required datatable js -->
        <script src="{{ asset('crovex') }}/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('crovex') }}/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('crovex') }}/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ asset('crovex') }}/datatables/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('crovex') }}/pages/jquery.datatable.init.js"></script>

        <!-- Page Specific JS File -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @yield('sweetAlert')
        <script type="text/javascript">
            @if(Session::has('sukses'))
                toastr.success("{{Session::get('sukses')}}", "Sukses")
            @endif
        </script>
        <script src="{{ asset('crovex/dropify/js/dropify.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        default: 'Drag atau drop untuk memilih gambar',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });
            });
        </script>
    </body>

</html>