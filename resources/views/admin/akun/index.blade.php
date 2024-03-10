@extends('layouts.crovex-admin')
@section('title','Profile')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
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
                    <form action="/admin/profile/{{ $admin->id }}/update" method="post" class="needs-validation" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"  value="{{ $admin->email }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control" value="{{ $admin->jenis_kelamin }}">
                                    <div class="invalid-feedback">
                                        Please fill in the Jenis Kelamin
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nomor HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="{{ $admin->no_hp }}">
                                    <div class="invalid-feedback">
                                        Please fill in the Jenis Kelamin
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama Provinsi</label>
                                    <select name="province_id" class="form-control">
                                        @foreach ($province as $data)
                                            <option value="{{ $data->id }}"
                                            @if($data->province_id == $admin->province_id)
                                                selected
                                            @endif
                                            >{{ $data->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill in the Jenis Kelamin
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama Kota</label>
                                    <select name="city_id" class="form-control">
                                        @foreach ($city as $data)
                                            <option value="{{ $data->id }}"
                                            @if($data->city_id == $admin->city_id)
                                                selected
                                            @endif
                                            >{{ $data->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control summernote-simple">{{ $admin->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
