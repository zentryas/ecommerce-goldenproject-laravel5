@extends('layouts.crovex-admin')
@section('title','Ganti Password')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Ganti Password</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Ganti Password</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
        <p class="section-lead">
            Halaman untuk mengganti informasi pribadi anda
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('template_users/img/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Produk</div>
                            <div class="profile-widget-item-value">{{ $produk->count() }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Kategori</div>
                            <div class="profile-widget-item-value">{{ $kategori->count() }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Customer</div>
                            <div class="profile-widget-item-value">{{ $user->count() }}</div>
                        </div>
                    </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ Auth::user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ Auth::user()->level }}</div></div>
                        @if($admin->level == "Administrator")
                            Tugas dari kerja admin adalah melakukan menambahkan data, update data dan hapus data terhadap data kategori dan data produk. Selain itu admin mengolah data pesanan dengan mencetak alamat pengiriman dan memasukan nomor resi kepada pelanggan
                        @else
                            Tugas manager adalah memantau halaman riwayat penjualan dan melihat laporan penjualan
                        @endif
                    </div>
                </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form action="/admin/profile/{{ $admin->id }}/ganti-password/update" method="post" class="needs-validation" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h4>Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
