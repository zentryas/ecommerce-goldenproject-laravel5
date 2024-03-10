<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('admin.customer.index', compact('user'));
    }
}
