@extends('layouts.auth')
@section('title','Golden Face Store | Reset Password')
@section('konten')
<div class="card-body">
    <div class="px-3">
        <div class="auth-logo-box">
            <a href="/admin/login" class="logo logo-admin"><img src="{{ asset('crovex') }}/images/logo-new.png" height="55" alt="logo" class="auth-logo"></a>
        </div><!--end auth-logo-box-->
        
        <div class="text-center auth-logo-text">
            <h4 class="mt-0 mb-3 mt-5">Reset Password</h4>
            <p class="text-muted mb-0">Tuliskan email anda lalu kirim, kemudian cek akun Google Mail!</p>  
        </div> <!--end auth-logo-text-->  

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group mb-3">
                    <span class="auth-form-icon">
                        <i class="dripicons-mail"></i> 
                    </span>                                                                                                              
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                                    
            </div><!--end form-group-->        

            <div class="form-group mb-0 row">
                <div class="col-12 mt-2">
                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Reset <i class="fas fa-sign-in-alt ml-1"></i></button>
                </div><!--end col--> 
            </div> <!--end form-group-->                           
        </form><!--end form-->
    </div><!--end /div-->
</div><!--end card-body-->
@endsection