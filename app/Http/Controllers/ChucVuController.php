<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu; // Đảm bảo bạn đã import model ChucVu

class ChucVuController extends Controller
{
    public function index(Request $request)
{
    // Lấy giá trị tìm kiếm từ yêu cầu
    $search = $request->get('search');

    // Tạo truy vấn để lấy dữ liệu chức vụ
    $query = ChucVu::query(); // Khởi tạo truy vấn

    // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('TenChucVu', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('MaChucVu', 'LIKE', '%' . $searchTerm . '%'); // Thêm điều kiện tìm kiếm theo mã phòng ban
        });
    }

    // Thực hiện truy vấn và lấy dữ liệu
    $chucvus = $query->get();

    // Trả về view với dữ liệu
    return view('chucvus.index', compact('chucvus'));
}

    public function create()
{
    return view('chucvus.create');
}

public function store(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'TenChucVu' => 'required|max:255',
        'MoTa' => 'nullable',
    ]);

    // Tạo mới chức vụ
    $chucvu = new ChucVu();
    $chucvu->TenChucVu = $request->TenChucVu;
    $chucvu->MoTa = $request->MoTa;
    $chucvu->save();

    return redirect()->route('chucvus.index')->with('success', 'Chức vụ đã được thêm thành công.');
}
    public function edit($id)
    {
        $chucvu = ChucVu::findOrFail($id);
        return view('chucvus.edit', compact('chucvu'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'TenChucVu' => 'required|max:255',
            'MoTa' => 'nullable',
        ]);
    
        $chucvu = ChucVu::findOrFail($id);
        $chucvu->TenChucVu = $request->TenChucVu;
        $chucvu->MoTa = $request->MoTa;
        $chucvu->save();
    
        return redirect()->route('chucvus.index')->with('success', 'Chức vụ đã được cập nhật thành công.');
    }
    
    public function destroy($id)
    {
        $chucvu = ChucVu::findOrFail($id);
        $chucvu->delete();
    
        return redirect()->route('chucvus.index')->with('success', 'Chức vụ đã được xóa thành công.');
    }
    
    // Các phương thức khác của controller...
}
