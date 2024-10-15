<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UngLuong; // Đảm bảo import model UngLuong

class UngLuongController extends Controller
{
    // Hiển thị danh sách ứng lương
    public function index(Request $request)
{
    // Lấy giá trị tìm kiếm từ yêu cầu
    $search = $request->get('search');

    // Tạo truy vấn để lấy dữ liệu ứng lương
    $query = UngLuong::query(); // Bắt đầu truy vấn UngLuong

    // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
    if ($search) {
        $query->where('MaUngLuong', 'LIKE', "%{$search}%"); // Tìm kiếm theo MaUngLuong
    }

    // Thực hiện truy vấn và lấy dữ liệu
    $ungluongs = $query->get();

    // Trả về view với danh sách ứng lương
    return view('ungluongs.index', compact('ungluongs'));
}


    // Hiển thị form tạo mới ứng lương
    public function create()
    {
        return view('ungluongs.create');
    }

    // Xử lý lưu dữ liệu ứng lương mới vào database
    public function store(Request $request)
    {
    $request->validate([
        'MaNhanVien' => 'required',
        'SoTien' => 'required|numeric',
        'NgayUngLuong' => 'required|date',
        'GhiChu' => 'nullable|string'
    ]);

    UngLuong::create($request->all());

    return redirect()->route('ungluongs.index')->with('success', 'Thêm ứng lương thành công.');
    }
    public function edit($id)
    {
    $ungluong = UngLuong::findOrFail($id);
    return view('ungluongs.edit', compact('ungluong'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'MaNhanVien' => 'required',
        'SoTien' => 'required|numeric',
        'NgayUngLuong' => 'required|date',
        'GhiChu' => 'nullable|string'
    ]);

    $ungluong = UngLuong::findOrFail($id);
    $ungluong->update($request->all());

    return redirect()->route('ungluongs.index')->with('success', 'Cập nhật ứng lương thành công.');
    }

    public function destroy($id)
    {
        // Kiểm tra nếu ứng lương có tồn tại
        $ungluong = UngLuong::find($id);

        if (!$ungluong) {
            return redirect()->route('ungluongs.index')->with('error', 'Ứng lương không tồn tại.');
        }

        // Xóa ứng lương
        $ungluong->delete();

        return redirect()->route('ungluongs.index')->with('success', 'Ứng lương đã được xóa thành công.');
    }
    // Các phương thức khác (edit, update, destroy...) sẽ được bổ sung nếu cần
}
