@extends('layouts.admin')

@section('title', 'Sửa Phòng Ban')

@section('content')
<div class="container">
    <h1 class="mb-4">Sửa Phòng Ban</h1>

    <form action="{{ url('/admin/phongbans/' . $phongban->MaPhongBan) }}" method="POST">
        @csrf
        @method('PUT') <!-- Giả lập phương thức PUT -->

        <div class="form-group">
            <label for="MaPhongBan">Mã Phòng Ban</label>
            <input type="text" class="form-control" id="MaPhongBan" name="MaPhongBan" value="{{ $phongban->MaPhongBan }}" readonly>
        </div>

        <div class="form-group">
            <label for="TenPhongBan">Tên Phòng Ban</label>
            <input type="text" class="form-control" id="TenPhongBan" name="TenPhongBan" value="{{ $phongban->TenPhongBan }}" required>
        </div>

        <div class="form-group">
            <label for="MaTruongPhong">Mã Trưởng Phòng</label>
            <input type="text" class="form-control" id="MaTruongPhong" name="MaTruongPhong" value="{{ $phongban->MaTruongPhong }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ url('/admin/phongbans') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
