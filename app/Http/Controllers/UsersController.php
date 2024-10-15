<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
{
    // Lấy giá trị tìm kiếm từ yêu cầu
    $search = $request->get('search');

    // Tạo truy vấn để lấy dữ liệu người dùng
    $query = Users::query(); // Bắt đầu truy vấn Users

    // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
    if ($search) {
        $query->where('UserID', 'LIKE', "%{$search}%"); // Tìm kiếm theo UserID
    }

    // Thực hiện truy vấn và lấy dữ liệu
    $users = $query->get();

    // Trả về view với danh sách người dùng
    return view('users.index', compact('users'));
}


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Username' => 'required|unique:users|max:255',
            'Password' => 'required|min:6',
            'MaNhanVien' => 'required|integer',
            'Role' => 'nullable|string', // Make Role optional
        ]);
    
        Users::create([
            'Username' => $request->input('Username'),
            'Password' => Hash::make($request->input('Password')),
            'MaNhanVien' => $request->input('MaNhanVien'),
            'Role' => $request->input('Role') ?? 'user', // Default role
        ]);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($UserID)
    {
        $user = Users::where('UserID', $UserID)->firstOrFail();
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, $UserID)
{
    $user = Users::where('UserID', $UserID)->firstOrFail();

    $request->validate([
        'Username' => 'required|max:255|unique:users,Username,' . $user->UserID . ',UserID',
        'Password' => 'nullable|min:6',
        'MaNhanVien' => 'required|integer',
        'Role' => 'required|string|in:user,admin',
    ]);

    $user->Username = $request->input('Username');
    if ($request->filled('Password')) {
        $user->Password = Hash::make($request->input('Password'));
    }
    $user->MaNhanVien = $request->input('MaNhanVien');
    $user->Role = $request->input('Role');
    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

    
    
    public function destroy(Users $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

