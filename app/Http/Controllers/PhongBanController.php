<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    // Hiển thị danh sách phòng ban
    public function index(Request $request)
    {
        $query = PhongBan::query();

        // Tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('TenPhongBan', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('MaPhongBan', 'LIKE', '%' . $searchTerm . '%'); // Thêm điều kiện tìm kiếm theo mã phòng ban
            });
        }

        $phongbans = $query->paginate(10); // Phân trang

        return view('phongbans.index', compact('phongbans'));
    }

    // Hiển thị form tạo phòng ban
    public function create()
    {
        return view('phongbans.create');
    }

    // Xử lý lưu phòng ban mới
    public function store(Request $request)
    {
        $request->validate([
            'MaPhongBan' => 'required|unique:phongban',
            'TenPhongBan' => 'required',
            'MaTruongPhong' => 'nullable'
        ]);

        PhongBan::create($request->all());
        return redirect()->route('phongbans.index')->with('success', 'Thêm phòng ban thành công.');
    }

    // Hiển thị form sửa phòng ban
    public function edit($id)
    {
        $phongban = PhongBan::findOrFail($id);
        return view('phongbans.edit', compact('phongban'));
    }

    // Cập nhật phòng ban
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaPhongBan' => 'required',
            'TenPhongBan' => 'required',
            'MaTruongPhong' => 'nullable'
        ]);

        $phongban = PhongBan::findOrFail($id);
        $phongban->update($request->all());

        return redirect()->route('phongbans.index')->with('success', 'Cập nhật phòng ban thành công.');
    }

    // Xóa phòng ban
    public function destroy($MaPhongBan)
    {
        // Kiểm tra xem phòng ban có tồn tại không
        $phongban = PhongBan::find($MaPhongBan);

        if (!$phongban) {
            return redirect()->route('phongbans.index')->with('error', 'Phòng ban không tồn tại.');
        }

        // Kiểm tra có nhân viên nào thuộc phòng ban này không
        if ($phongban->nhanviens()->count() > 0) {
            return redirect()->route('phongbans.index')->with('error', 'Không thể xóa phòng ban vì có nhân viên thuộc phòng ban này.');
        }

        // Xóa phòng ban
        $phongban->delete();

        return redirect()->route('phongbans.index')->with('success', 'Xóa phòng ban thành công.');
    }
}
