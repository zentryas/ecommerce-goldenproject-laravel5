@extends('layouts.auth')
@section('title','Golden Face Store | Login Admin')
@section('konten')
<div class="card-body">
    <div class="px-3">
        <div class="auth-logo-box">
            <a href="/admin/login" class="logo logo-admin"><img src="{{ asset('crovex') }}/images/logo-new.png" height="55" alt="logo" class="auth-logo"></a>
        </div><!--end auth-logo-box-->
        
        <div class="text-center auth-logo-text">
            <h4 class="mt-0 mb-3 mt-5">Login Admin</h4>
            <p class="text-muted mb-0">Sign in sebagai admin <b>Golden Face Store</b></p>  
        </div> <!--end auth-logo-text-->  

        
        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('admin.login.submit') }}">
          @csrf
            <div class="form-group">
                <label for="">Email</label>
                <div class="input-group mb-3">
                    <span class="auth-form-icon">
                        <i class="dripicons-user"></i> 
                    </span>                                                                                                              
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                                    
            </div><!--end form-group--> 

            <div class="form-group">
                <label for="userpassword">Password</label>                                            
                <div class="input-group mb-3"> 
                    <span class="auth-form-icon">
                        <a href="#" onclick="cek1pass()"><i class="dripicons-lock"></i> </a>
                    </span>                                                       
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                               
            </div><!--end form-group--> 

            <div class="form-group row mt-4">
                <div class="col-sm-6">
                    <div class="custom-control custom-switch switch-success">
                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                        <label class="custom-control-label text-muted" for="customSwitchSuccess">Ingat saya</label>
                    </div>
                </div><!--end col--> 
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Lupa password?</a>                                    
                </div><!--end col--> 
            </div><!--end form-group--> 

            <div class="form-group mb-0 row">
                <div class="col-12 mt-2">
                    <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                </div><!--end col--> 
            </div> <!--end form-group-->                           
        </form><!--end form-->
    </div><!--end /div-->
</div><!--end card-body-->

@endsection