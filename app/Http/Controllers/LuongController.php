<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luong; // Đảm bảo import model Luong
use App\Models\Nhanvien;
class LuongController extends Controller
{
    // Hiển thị danh sách lương
    public function index(Request $request)
{
    // Lấy giá trị tìm kiếm từ yêu cầu
    $search = $request->get('search');

    // Tạo truy vấn để lấy dữ liệu lương
    $query = Luong::with('nhanvien'); // Lấy thông tin lương kèm theo thông tin nhân viên

    // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
    if ($search) {
        $query->where('MaLuong', 'LIKE', "%{$search}%"); // Tìm kiếm theo MaLuong
    }

    // Thực hiện truy vấn và lấy dữ liệu
    $luongs = $query->get();

    // Trả về view với danh sách lương
    return view('luongs.index', compact('luongs'));
}


    // Hiển thị form tạo mới lương
    public function create()
    {
        $nhanviens = Nhanvien::all(); // Lấy danh sách nhân viên
        return view('luongs.create', compact('nhanviens'));
    }

    // Xử lý việc lưu lương mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'MaNhanVien' => 'required|integer',
            'Thang' => 'required|integer',
            'Nam' => 'required|integer',
            'LuongCoBan' => 'required|numeric',
            'Thuong' => 'nullable|numeric',
            'KhauTru' => 'nullable|numeric',
        ]);
    
        // Tính toán Tổng Lương
        $luong = new Luong();
        $luong->MaNhanVien = $request->input('MaNhanVien');
        $luong->Thang = $request->input('Thang');
        $luong->Nam = $request->input('Nam');
        $luong->LuongCoBan = $request->input('LuongCoBan');
        $luong->Thuong = $request->input('Thuong', 0);
        $luong->KhauTru = $request->input('KhauTru', 0);
        $luong->TongLuong = $luong->LuongCoBan + $luong->Thuong - $luong->KhauTru;
        $luong->save();
    
        return redirect()->route('luongs.index')->with('success', 'Lương đã được thêm.');
    }
    
    public function update(Request $request, $MaLuong)
{
    $validated = $request->validate([
        'Thang' => 'required|integer',
        'Nam' => 'required|integer',
        'LuongCoBan' => 'required|numeric',
        'Thuong' => 'nullable|numeric',
        'KhauTru' => 'nullable|numeric',
    ]);

    $luong = Luong::findOrFail($MaLuong);
    $luong->Thang = $request->Thang;
    $luong->Nam = $request->Nam;
    $luong->LuongCoBan = $request->LuongCoBan;
    $luong->Thuong = $request->Thuong;
    $luong->KhauTru = $request->KhauTru;
    $luong->TongLuong = $request->LuongCoBan + $request->Thuong - $request->KhauTru;
    $luong->save();

    return redirect()->route('luongs.index')->with('success', 'Lương đã được cập nhật thành công!');
}

    

    public function edit($id)
    {
        $luong = Luong::findOrFail($id);
        $nhanviens = Nhanvien::all(); // Lấy danh sách nhân viên
        return view('luongs.edit', compact('luong', 'nhanviens'));
    }
    

    // Xử lý việc cập nhật lương
    public function destroy(Luong $luong)
{
    $luong->delete(); // Thực hiện xóa bản ghi
    return redirect()->route('luongs.index')
                     ->with('success', 'Lương đã được xóa thành công.');
}

}
