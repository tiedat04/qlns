<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\ChucVu;
use App\Models\PhongBan;
use App\Models\HopDong;
use App\Models\Luong;

class NhanVienController extends Controller
{
    public function index(Request $request)
{
    $query = NhanVien::query();

    // Tìm kiếm
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('HoTen', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('MaNhanVien', 'LIKE', '%' . $searchTerm . '%'); // Thêm điều kiện tìm kiếm theo mã nhân viên
        });
    }

    $nhanviens = $query->paginate(10); // Phân trang

    return view('nhanviens.index', compact('nhanviens'));
}

    
    public function create()
    {
        // Lấy danh sách các chức vụ và phòng ban từ cơ sở dữ liệu
        $chucvus = ChucVu::all();
        $phongbans = PhongBan::all();

        // Truyền dữ liệu vào view
        return view('nhanviens.create', compact('chucvus', 'phongbans'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'HoTen' => 'required|string|max:255',
            'GioiTinh' => 'required|string',
            'NgaySinh' => 'required|date',
            'DiaChi' => 'required|string|max:255',
            'SoDienThoai' => 'required|string|max:15',
            'Email' => 'required|email|unique:nhanvien',
            'MaChucVu' => 'required|exists:chucvu,MaChucVu',
            'MaPhongBan' => 'required|exists:phongban,MaPhongBan',
            'NgayVaoLam' => 'required|date',
            'TongCong' => 'integer',
            'NgayChamCongCuoi' => 'date|nullable',
            'AnhNhanVien' => 'image|nullable|max:2048', // Optional image upload
        ]);
    
        // Check if there's already an employee with the role of 'Trưởng Phòng'
        if ($request->MaChucVu == 'Mã của Trưởng Phòng') {
            $existingManager = NhanVien::where('MaChucVu', 'Mã của Trưởng Phòng')->first();
            if ($existingManager) {
                return back()->withErrors(['MaChucVu' => 'Đã có một nhân viên giữ chức vụ Trưởng Phòng.']);
            }
        }
    
        // Create new employee
        $nhanvien = new NhanVien();
        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->GioiTinh = $request->GioiTinh;
        $nhanvien->NgaySinh = $request->NgaySinh;
        $nhanvien->DiaChi = $request->DiaChi;
        $nhanvien->SoDienThoai = $request->SoDienThoai;
        $nhanvien->Email = $request->Email;
        $nhanvien->MaChucVu = $request->MaChucVu;
        $nhanvien->MaPhongBan = $request->MaPhongBan;
        $nhanvien->NgayVaoLam = $request->NgayVaoLam;
        $nhanvien->TongCong = $request->TongCong;
        $nhanvien->NgayChamCongCuoi = $request->NgayChamCongCuoi;
    
        // Handle image upload if provided
        if ($request->hasFile('AnhNhanVien')) {
            $file = $request->file('AnhNhanVien');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('anh'), $filename);
            $nhanvien->AnhNhanVien = $filename;
        }
    
        $nhanvien->save();
    
        return redirect()->route('nhanviens.index')->with('success', 'Thêm nhân viên thành công!');
    }
    

    public function show($MaNhanVien)
    {
        // Tìm nhân viên dựa vào mã nhân viên
        $nhanvien = NhanVien::with(['chucvu', 'phongban'])->findOrFail($MaNhanVien);
    
        // Giả sử bạn có một model HopDong để lấy hợp đồng của nhân viên
        $hopdong = HopDong::where('MaNhanVien', $MaNhanVien)->first();
    
        // Lấy thông tin lương của nhân viên
        $luong = Luong::where('MaNhanVien', $MaNhanVien)->first(); // Bạn có thể điều chỉnh câu query nếu cần
    
        // Trả về view và truyền dữ liệu của nhân viên, hợp đồng và lương
        return view('nhanviens.show', compact('nhanvien', 'hopdong', 'luong'));
    }
    
    public function show1($id)
    {
        // Tìm nhân viên dựa vào id
        $nhanvien = NhanVien::with(['chucvu', 'phongban'])->findOrFail($id);// Trả về view khác và truyền dữ liệu của nhân viên
        return view('nhanviens.show1', compact('nhanvien'));
    }
    public function edit($MaNhanVien)
    {
        // Tìm nhân viên theo mã
        $nhanvien = NhanVien::findOrFail($MaNhanVien);
        
        // Lấy danh sách các chức vụ và phòng ban
        $chucvus = ChucVu::all();
        $phongbans = PhongBan::all();
        
        // Truyền dữ liệu sang view để hiển thị form chỉnh sửa
        return view('nhanviens.edit', compact('nhanvien', 'chucvus', 'phongbans'));
    }

    public function update(Request $request, $MaNhanVien)
    {
        $nhanvien = NhanVien::findOrFail($MaNhanVien);
    
        // Validate dữ liệu, including TongCong
        $request->validate([
            'HoTen' => 'required|string|max:255',
            'GioiTinh' => 'required|in:Nam,Nữ',
            'TongCong' => 'nullable|integer', // Add this line
            // Other validation rules if needed
        ]);
    
        // Cập nhật dữ liệu
        $nhanvien->update([
            'HoTen' => $request->HoTen,
            'GioiTinh' => $request->GioiTinh,
            'TongCong' => $request->TongCong, // Add this line
            'NgaySinh' => $request->NgaySinh,
            'DiaChi' => $request->DiaChi,
            'SoDienThoai' => $request->SoDienThoai,
            'Email' => $request->Email,
            'MaPhongBan' => $request->MaPhongBan,
            'MaChucVu' => $request->MaChucVu,
            'NgayVaoLam' => $request->NgayVaoLam,
            'NgayNghiViec' => $request->NgayNghiViec,
        ]);
    
        // If there's an uploaded image, handle it
        if ($request->hasFile('AnhNhanVien')) {
            $file = $request->file('AnhNhanVien');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('anh'), $filename);
            $nhanvien->AnhNhanVien = $filename;
        }
    
        // Save changes
        $nhanvien->save();
    
        return redirect()->route('nhanviens.show', $nhanvien->MaNhanVien)->with('success', 'Cập nhật thông tin thành công');
    }
    

    public function destroy($MaNhanVien)
{
    // Kiểm tra nếu nhân viên có tồn tại
    $nhanvien = NhanVien::find($MaNhanVien);

    if (!$nhanvien) {
        return redirect()->route('nhanviens.index')->with('error', 'Nhân viên không tồn tại.');
    }

    // Xóa các bản ghi liên quan trong bảng `users`
    \DB::table('users')->where('MaNhanVien', $MaNhanVien)->delete();

    // Xóa nhân viên
    $nhanvien->delete();

    return redirect()->route('nhanviens.index')->with('success', 'Nhân viên đã được xóa thành công.');
}
public function chamCong($MaNhanVien)
{
    // Find the employee by ID
    $nhanvien = NhanVien::findOrFail($MaNhanVien);

    // Get today's date
    $today = now()->toDateString();

    // Check if the employee has already clocked in today
    if ($nhanvien->NgayChamCongCuoi === $today) {
        // Return a JSON response with an error message
        return response()->json(['error' => 'Nhân viên đã chấm công hôm nay.'], 400);
    }

    // If not clocked in, proceed to clock in
    $nhanvien->TongCong += 1;
    $nhanvien->NgayChamCongCuoi = $today; // Update last clock-in date

    // Save changes
    $nhanvien->save();

    return response()->json(['success' => 'Chấm công thành công cho nhân viên: ' . $nhanvien->HoTen]);
}

}
        