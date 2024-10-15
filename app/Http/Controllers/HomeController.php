<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        // Logic để hiển thị trang home của người dùng
        return view('layouts.home', ['user_id' => $id]);
    }
}
