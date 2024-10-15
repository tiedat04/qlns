<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic để hiển thị dashboard của admin
        return view('admin.dashboard');
    }
}
