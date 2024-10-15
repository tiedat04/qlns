@extends('layouts.admin')

@section('title', 'Sửa Nhân Viên')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Sửa Thông Tin Nhân Viên</h2>
        </div>
        <div class="card-body">
            <!-- Form cập nhật thông tin nhân viên -->
            <form action="{{ route('nhanviens.update', $nhanvien->MaNhanVien) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Ảnh Nhân Viên -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('anh/' . $nhanvien->AnhNhanVien) }}" 
                             alt="{{ $nhanvien->HoTen }}" 
                             class="img-fluid rounded-circle mb-3 shadow" 
                             style="width: 250px; height: 250px; object-fit: cover;">
                        <h4 class="text-muted">{{ $nhanvien->HoTen }}</h4>
                        <div class="form-group mt-3">
                            <label for="AnhNhanVien" class="form-label">Cập Nhật Ảnh</label>
                            <input type="file" class="form-control-file" name="AnhNhanVien">
                        </div>
                    </div>

                    <!-- Thông Tin Nhân Viên -->
                    <div class="col-md-8">
                        <!-- MaNhanVien -->
                        <div class="form-group mb-3">
                            <label for="MaNhanVien" class="form-label">Mã Nhân Viên</label>
                            <input type="text" class="form-control rounded-pill" name="MaNhanVien" value="{{ $nhanvien->MaNhanVien }}" readonly>
                        </div>

                        <!-- HoTen -->
                        <div class="form-group mb-3">
                            <label for="HoTen" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control rounded-pill" name="HoTen" value="{{ $nhanvien->HoTen }}">
                        </div>

                        <!-- GioiTinh -->
                        <div class="form-group mb-3">
                            <label for="GioiTinh" class="form-label">Giới Tính</label>
                            <select class="form-control rounded-pill" name="GioiTinh">
                                <option value="Nam" {{ $nhanvien->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ $nhanvien->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>

                        <!-- NgaySinh -->
                        <div class="form-group mb-3">
                            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                            <input type="date" class="form-control rounded-pill" name="NgaySinh" value="{{ $nhanvien->NgaySinh }}">
                        </div>

                        <!-- DiaChi -->
                        <div class="form-group mb-3">
                            <label for="DiaChi" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control rounded-pill" name="DiaChi" value="{{ $nhanvien->DiaChi }}">
                        </div>

                        <!-- SoDienThoai -->
                        <div class="form-group mb-3">
                            <label for="SoDienThoai" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control rounded-pill" name="SoDienThoai" value="{{ $nhanvien->SoDienThoai }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-pill" name="Email" value="{{ $nhanvien->Email }}">
                        </div>

                        <!-- MaPhongBan -->
                        <div class="form-group mb-3">
                            <label for="PhongBan" class="form-label">Phòng Ban</label>
                            <select class="form-control rounded-pill" name="MaPhongBan">
                                @foreach($phongbans as $phongban)
                                    <option value="{{ $phongban->MaPhongBan }}" {{ $nhanvien->MaPhongBan == $phongban->MaPhongBan ? 'selected' : '' }}>
                                        {{ $phongban->TenPhongBan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- MaChucVu -->
                        <div class="form-group mb-3">
                            <label for="ChucVu" class="form-label">Chức Vụ</label>
                            <select class="form-control rounded-pill" name="MaChucVu">
                                @foreach($chucvus as $chucvu)
                                    <option value="{{ $chucvu->MaChucVu }}" {{ $nhanvien->MaChucVu == $chucvu->MaChucVu ? 'selected' : '' }}>
                                        {{ $chucvu->TenChucVu }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- NgayVaoLam -->
                        <div class="form-group mb-3">
                            <label for="NgayVaoLam" class="form-label">Ngày Vào Làm</label>
                            <input type="date" class="form-control rounded-pill" name="NgayVaoLam" value="{{ $nhanvien->NgayVaoLam }}" readonly>
                        </div>

                        <!-- NgayNghiViec -->
                        <div class="form-group mb-3">
                            <label for="NgayNghiViec" class="form-label">Ngày Nghỉ Việc (Có Thể Để Trống)</label>
                            <input type="date" class="form-control rounded-pill" name="NgayNghiViec" value="{{ $nhanvien->NgayNghiViec ?? '' }}" placeholder="Chưa nghỉ việc">
                        </div>

                        <!-- TongCong -->
                        <div class="form-group mb-3">
                            <label for="TongCong" class="form-label">Tổng Công</label>
                            <input type="number" class="form-control rounded-pill" name="TongCong" value="{{ $nhanvien->TongCong }}">
                        </div>

                        <!-- Ngày Chấm Công Cuối -->
                        <div class="form-group mb-3">
                            <label for="NgayChamCongCuoi" class="form-label">Ngày Chấm Công Cuối</label>
                            <input type="text" class="form-control rounded-pill" name="NgayChamCongCuoi" value="{{ $nhanvien->NgayChamCongCuoi }}" readonly>
                        </div>

                        <!-- Nút Lưu -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success rounded-pill btn-lg">Lưu Thay Đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
