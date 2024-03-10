@extends('layouts.crovax-admin')
@section('title','Golden Face Store | Dashboard')
@section('konten')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Halaman Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Pelanggan</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $pelanggan->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user-group card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Admin</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $admin->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-user card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Kategori</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $kategori->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-checklist card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Supplier</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $supplier->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-enter card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Produk</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $produk->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">👳🏻</span> -->
                            <i class="dripicons-archive card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>  
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">  
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Menunggu Pembayaran</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $waiting->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">🛒</span> -->
                            <i class="dripicons-clock card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div> 
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Sudah dibayar</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $sudah_dibayar->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">🎲</span> -->
                            <i class="dripicons-wallet card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div> 
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">                                    
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Paket dikirim</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $sedang_dikirim->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">💰</span> -->
                            <i class="dripicons-rocket card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">                                    
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Transaksi Batal</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $batal->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">💰</span> -->
                            <i class="dripicons-wrong card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-md-4">
            <div class="card card-eco">
                <div class="card-body">                                    
                    <div class="row">
                        <div class="col-8">
                            <h4 class="title-text mt-0">Transaksi Selesai</h4>
                            <h3 class="font-weight-semibold mb-1">{{ $selesai->count() }}</h3>
                        </div><!--end col-->
                        <div class="col-4 text-center align-self-center">
                            <!-- <span class="card-eco-icon">💰</span> -->
                            <i class="dripicons-graph-line card-eco-icon  align-self-center"></i>  
                        </div>  <!--end col-->                                                                           
                    </div> <!--end row-->
                    <div class="bg-pattern"></div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
</div><!-- container -->
@endsection
