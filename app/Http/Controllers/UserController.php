<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
        public function register(Request $request)
        {
            // Xác thực dữ liệu đầu vào
            $validator = Validator::make($request->all(), [
                'Username' => 'required|unique:users|max:255',
                'Password' => 'required|min:6',
                'MaNhanVien' => 'nullable|exists:nhanvien,MaNhanVien',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Tạo người dùng mới với Role mặc định là 'user'
            User::create([
                'Username' => $request->Username,
                'Password' => $request->Password, // Tự động mã hóa mật khẩu trong model
                'MaNhanVien' => $request->MaNhanVien,
                'Role' => 'user',
            ]);
    
            // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
            
            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        }
    }
    