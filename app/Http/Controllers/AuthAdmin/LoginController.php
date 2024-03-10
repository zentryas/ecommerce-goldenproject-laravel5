<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authAdmin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	], [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
    	{
            // alert()->success('Login berhasil', 'Sukses!');
    		return redirect()->intended(route('admin.dashboard'))->withSuccess('Login Berhasil');
    	}
        // alert()->warning('Data tidak sesuai', 'Peringatan!');
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        // alert()->success('Logout berhasil', 'Sukses!');
        return redirect('/admin/login');
    }
}
