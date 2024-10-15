@extends('layouts.admin')

@section('title', 'Thêm Phòng Ban')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Phòng Ban</h1>

    <form action="{{ url('/admin/phongbans') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="MaPhongBan">Mã Phòng Ban</label>
            <input type="text" class="form-control @error('MaPhongBan') is-invalid @enderror" id="MaPhongBan" name="MaPhongBan" value="{{ old('MaPhongBan') }}" required>
            @error('MaPhongBan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="TenPhongBan">Tên Phòng Ban</label>
            <input type="text" class="form-control @error('TenPhongBan') is-invalid @enderror" id="TenPhongBan" name="TenPhongBan" value="{{ old('TenPhongBan') }}" required>
            @error('TenPhongBan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="MaTruongPhong">Mã Trưởng Phòng</label>
            <input type="text" class="form-control @error('MaTruongPhong') is-invalid @enderror" id="MaTruongPhong" name="MaTruongPhong" value="{{ old('MaTruongPhong') }}" required>
            @error('MaTruongPhong')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm Phòng Ban</button>
        <a href="{{ url('/admin/phongbans') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
