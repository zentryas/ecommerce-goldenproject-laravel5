@extends('layouts.app')
@section('title','Registrasi')
@section('content')
<div class="container mt-5 mb-5 px-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Daftar Akun Pelanggan</h3>
            <p>Silahkan masukan data pribadi dan data login, atau sudah mempunyai akun silahkan <a href="/login">Login disini</a>.</p>
            <form class="contact-form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mt-5">
                    <label for="" class="text-info">Data Pribadi</label>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-md-4 col-form-label">Nomor Hp</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" autocomplete="no_hp" autofocus>
                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-8">
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror drop-edit">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Pria"{{(old('jenis_kelamin') == 'Pria') ? 'selected' : ''}}>Pria</option>
                            <option value="Wanita"{{(old('jenis_kelamin') == 'Wanita') ? 'selected' : ''}}>Wanita</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-md-4 col-form-label">Alamat</label>
                    <div class="col-md-8">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="" rows="3" autocomplete="alamat" autofocus>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mt-5">
                    <label for="" class="text-info">Data Login</label>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">Password</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label">Konfirmasi Password</label>
                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
