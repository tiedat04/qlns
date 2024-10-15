@extends('layouts.admin')

@section('title', 'Thêm Nhân Viên')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Nhân Viên Mới</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nhanviens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Mã Nhân Viên - Removed as it's auto-incremented -->
        <div class="form-group">
            <label for="HoTen">Họ Tên</label>
            <input type="text" name="HoTen" class="form-control" value="{{ old('HoTen') }}" required>
        </div>

        <div class="form-group">
            <label for="GioiTinh">Giới Tính</label>
            <select name="GioiTinh" class="form-control" required>
                <option value="">Chọn giới tính</option>
                <option value="Nam" {{ old('GioiTinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('GioiTinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh</label>
            <input type="date" name="NgaySinh" class="form-control" value="{{ old('NgaySinh') }}" required>
        </div>

        <div class="form-group">
            <label for="DiaChi">Địa Chỉ</label>
            <input type="text" name="DiaChi" class="form-control" value="{{ old('DiaChi') }}" required>
        </div>

        <div class="form-group">
            <label for="SoDienThoai">Số Điện Thoại</label>
            <input type="text" name="SoDienThoai" class="form-control" value="{{ old('SoDienThoai') }}" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="Email" class="form-control" value="{{ old('Email') }}" required>
        </div>

        <div class="form-group">
            <label for="MaChucVu">Chức Vụ</label>
            <select name="MaChucVu" class="form-control" required>
                <option value="">Chọn chức vụ</option>
                @foreach($chucvus as $chucvu)
                    <option value="{{ $chucvu->MaChucVu }}" {{ old('MaChucVu') == $chucvu->MaChucVu ? 'selected' : '' }}>{{ $chucvu->TenChucVu }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="MaPhongBan">Phòng Ban</label>
            <select name="MaPhongBan" class="form-control" required>
                <option value="">Chọn phòng ban</option>
                @foreach($phongbans as $phongban)
                    <option value="{{ $phongban->MaPhongBan }}" {{ old('MaPhongBan') == $phongban->MaPhongBan ? 'selected' : '' }}>{{ $phongban->TenPhongBan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="NgayVaoLam">Ngày Vào Làm</label>
            <input type="date" name="NgayVaoLam" class="form-control" value="{{ old('NgayVaoLam') }}" required>
        </div>

        <div class="form-group">
            <label for="NgayNghiViec">Ngày Nghỉ Việc</label>
            <input type="date" name="NgayNghiViec" class="form-control" value="{{ old('NgayNghiViec') }}">
        </div>

        <div class="form-group">
            <label for="TongCong">Tổng Công</label>
            <input type="number" name="TongCong" class="form-control" value="0" readonly>
            <small class="form-text text-muted">Tổng Công mặc định là 0.</small>
        </div>

        <div class="form-group">
            <label for="NgayChamCongCuoi">Ngày Chấm Công Cuối</label>
            <input type="date" name="NgayChamCongCuoi" class="form-control" value="{{ old('NgayChamCongCuoi') }}">
            <small class="form-text text-muted">Có thể để trống.</small>
        </div>

        <div class="form-group">
            <label for="AnhNhanVien">Ảnh Nhân Viên</label>
            <input type="file" name="AnhNhanVien" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
    </form>
</div>
@endsection
