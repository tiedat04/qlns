<?php

namespace App\Http\Controllers;

use App\Models\ChamCong;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class ChamCongController extends Controller
{
    public function index(Request $request)
{
    // Lấy giá trị tìm kiếm từ yêu cầu
    $search = $request->get('search');

    // Tạo truy vấn để lấy dữ liệu chấm công
    $query = ChamCong::with('nhanvien'); // Lấy dữ liệu chấm công kèm thông tin nhân viên

    // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
    if ($search) {
        $query->where('MaChamCong', 'LIKE', "%{$search}%"); // Tìm kiếm theo MaChamCong
    }

    // Thực hiện truy vấn và lấy dữ liệu
    $chamcongs = $query->get();

    // Trả về view với dữ liệu
    return view('chamcongs.index', compact('chamcongs'));
}


    public function create()
    {
        $nhanviens = NhanVien::all(); // Lấy danh sách nhân viên để tạo chấm công mới
        return view('chamcongs.create', compact('nhanviens'));
    }

   public function store(Request $request)
{
    // Xác thực dữ liệu nhận được từ form
    $request->validate([
        'MaNhanVien' => 'required|exists:nhanvien,MaNhanVien', // Nhân viên phải tồn tại trong bảng nhân viên
        'Ngay' => 'required|date', // Ngày phải hợp lệ
    ]);

    // Kiểm tra xem nhân viên đã được chấm công trong ngày này chưa
    $exists = ChamCong::where('MaNhanVien', $request->MaNhanVien)
        ->whereDate('Ngay', $request->Ngay)
        ->exists();

    if ($exists) {
        return redirect()->back()->withErrors('Nhân viên đã được chấm công trong ngày này.');
    }

    // Tạo mới bản ghi chấm công và tự động tính tổng công (1 công cho mỗi lần chấm công)
    $chamCong = new ChamCong();
    $chamCong->MaNhanVien = $request->MaNhanVien;
    $chamCong->Ngay = $request->Ngay;
    $chamCong->Tong = 1; // Giả định mỗi lần chấm công là 1 công
    $chamCong->save();

    // Cập nhật tổng công cho nhân viên
    $nhanVien = NhanVien::findOrFail($request->MaNhanVien);
    $nhanVien->TongCong += 1; // Tăng tổng công cho nhân viên
    $nhanVien->save();

    return redirect()->route('chamcongs.index')->with('success', 'Chấm công thành công.');
}

    

    public function edit($id)
    {
        $chamcong = ChamCong::findOrFail($id);
        $nhanviens = NhanVien::all();
        return view('chamcongs.edit', compact('chamcong', 'nhanviens'));
    }

    public function update(Request $request, $id)
    {
        $chamcong = ChamCong::findOrFail($id);
        $chamcong->update($request->all());
        return redirect()->route('chamcongs.index');
    }

    public function destroy($id)
    {
        $chamcong = ChamCong::findOrFail($id);
        $chamcong->delete();
        return redirect()->route('chamcongs.index');
    }
}

