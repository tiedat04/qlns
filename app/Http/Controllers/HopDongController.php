<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HopDong; // Đảm bảo import model HopDong
use App\Models\NhanVien;

class HopDongController extends Controller
{
    public function index(Request $request)
    {
        // Lấy giá trị tìm kiếm từ yêu cầu
        $search = $request->get('search');
    
        // Tạo truy vấn để lấy dữ liệu hợp đồng
        $query = HopDong::with('nhanvien'); // Lấy hợp đồng kèm thông tin nhân viên
    
        // Nếu có giá trị tìm kiếm, áp dụng điều kiện tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('MaHopDong', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('LoaiHopDong', 'LIKE', '%' . $searchTerm . '%'); // Thêm điều kiện tìm kiếm theo mã phòng ban
            });
        }
    
        // Thực hiện truy vấn và lấy dữ liệu
        $hopdongs = $query->get();
    
        // Trả về view với danh sách hợp đồng
        return view('hopdongs.index', compact('hopdongs'));
    }
    
    public function create()
    {
        // Lấy danh sách nhân viên từ database
        $nhanviens = NhanVien::all();
    
        // Trả về view với danh sách nhân viên
        return view('hopdongs.create', compact('nhanviens'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'LoaiHopDong' => 'required|max:255',
            'NgayBatDau' => 'required|date',
            'NgayKetThuc' => 'nullable|date', // Đặt nullable ở đây
            'MaNhanVien' => 'required|exists:nhanvien,MaNhanVien', // Kiểm tra mã nhân viên tồn tại
        ]);
    
        HopDong::create($request->all());
    
        return redirect()->route('hopdongs.index')->with('success', 'Hợp đồng đã được thêm thành công.');
    }
    
    
    public function edit($id)
    {
        $hopdong = HopDong::findOrFail($id);
        $nhanviens = NhanVien::all(); // Lấy tất cả nhân viên để hiển thị trong dropdown
        return view('hopdongs.edit', compact('hopdong', 'nhanviens'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'MaNhanVien' => 'required|exists:nhanvien,MaNhanVien',
            'LoaiHopDong' => 'required|max:255',
            'NgayBatDau' => 'required|date',
            'NgayKetThuc' => 'nullable|date',
        ]);
    
        $hopdong = HopDong::findOrFail($id);
        $hopdong->update($request->all());
    
        return redirect()->route('hopdongs.index')->with('success', 'Hợp đồng đã được cập nhật thành công.');
    }
    
    
        public function destroy($id)
        {
            $hopdong = HopDong::findOrFail($id);
            $hopdong->delete();
    
            return redirect()->route('hopdongs.index')->with('success', 'Hợp đồng đã được xóa thành công.');
        }
    }
    

