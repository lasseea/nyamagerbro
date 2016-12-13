<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function subscribe()
    {
        return view('auth.subscribe');
    }
}
