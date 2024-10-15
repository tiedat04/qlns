<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Hiển thị form đăng nhập
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);

        // Tìm người dùng theo tên đăng nhập
        $user = User::where('Username', $request->input('Username'))->first();

        if ($user && Hash::check($request->input('Password'), $user->Password)) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            Session::put('MaNhanVien', $user->MaNhanVien); // Lưu MaNhanVien vào session
            
            // Kiểm tra vai trò của người dùng và chuyển hướng
            if ($user->Role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } else {
                return redirect()->route('nhanvien.detail1', ['id' => $user->MaNhanVien])->with('success', 'Đăng nhập thành công!');
            }
        }

        // Đăng nhập thất bại
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
    }

    public function logout()
    {
        // Xóa thông tin người dùng khỏi session
        Session::forget('MaNhanVien');
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
}
