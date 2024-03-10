@extends('layouts.app')
@section('title','Login Pelanggan')
@section('content')
<div class="container mt-5 mb-5 px-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Login Pelanggan</h3>
            <p>Silahkan login bagi Pelanggan yang sudah melakukan <a href="/register">Registrasi</a>.</p>
            <form class="contact-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>
                    <div class="col-md-6">
                        <div class="d-block">
                            <div class="float-right">
                                <a href="{{ route('auth.activate.resend') }}" class="text-small" style="font-size: 12px;">Kirim Ulang Aktivasi Email?</a>
                            </div>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">Password</label>
                    <div class="col-md-6">
                        <div class="d-block">
                            <div class="float-right">
                                <a href="{{ route('password.request') }}" class="text-small" style="font-size: 12px;">Lupa Password?</a>
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-sm">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
