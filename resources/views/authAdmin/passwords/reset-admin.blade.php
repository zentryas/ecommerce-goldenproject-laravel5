@extends('layouts.auth')
@section('title','Golden Face Store | Ganti Password Baru')
@section('konten')
<div class="card-body">
    <div class="px-3">
        <div class="auth-logo-box">
            <a href="/admin/login" class="logo logo-admin"><img src="{{ asset('crovex') }}/images/logo-new.png" height="55" alt="logo" class="auth-logo"></a>
        </div><!--end auth-logo-box-->
        
        <div class="text-center auth-logo-text">
            <h4 class="mt-0 mb-3 mt-5">Ganti Password Baru</h4>
            <p class="text-muted mb-0">Tuliskan email anda ,password baru dan konfirmasi password baru!</p>  
        </div> <!--end auth-logo-text-->  

        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group mb-3">
                    <span class="auth-form-icon">
                        <i class="dripicons-mail"></i> 
                    </span>                                                                                                              
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                                    
            </div><!--end form-group-->  

            <div class="form-group">
                <label for="userpassword">Password Baru</label>                                            
                <div class="input-group mb-3"> 
                    <span class="auth-form-icon">
                        <i class="dripicons-lock"></i> 
                    </span>                                                       
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                               
            </div><!--end form-group-->

            <div class="form-group">
                <label for="userpassword">Konfirmasi Password Baru</label>                                            
                <div class="input-group mb-3"> 
                    <span class="auth-form-icon">
                        <a href="#" onclick="cek2pass()"><i class="dripicons-lock"></i> </a>
                    </span>                                                       
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>                               
            </div><!--end form-group-->      

            <div class="form-group mb-0 row">
                <div class="col-12 mt-2">
                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Simpan Perubahan <i class="fas fa-sign-in-alt ml-1"></i></button>
                </div><!--end col--> 
            </div> <!--end form-group-->                           
        </form><!--end form-->
    </div><!--end /div-->
</div><!--end card-body-->
@endsection