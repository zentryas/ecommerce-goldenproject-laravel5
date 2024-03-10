<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('userLogout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [
                'required','string',
                Rule::exists('pelanggan')->where(function ($query){
                    $query->where('active', true);
                })
            ],
            'password' => 'required|string',
        ], $this->validationError());
    }
    
    /**
     * Untuk memanggil suatu validasi eror di login users
     * 
     * @return array
     */
    public function validationError()
    {
        return [
            $this->username() . '.exists' => 'maaf, email anda belum melakukan aktivasi'
        ];
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/login')->with('sukses','Logout berhasil!');
    }
}
