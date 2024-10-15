@extends('layouts.admin')

@section('title', 'Sửa Hợp Đồng')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Sửa Thông Tin Hợp Đồng</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('hopdongs.update', $hopdong->MaHopDong) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mã Nhân Viên -->
                <div class="form-group mb-3">
                    <label for="MaNhanVien" class="form-label">Nhân Viên</label>
                    <select name="MaNhanVien" class="form-control" required>
                        @foreach($nhanviens as $nhanvien)
                            <option value="{{ $nhanvien->MaNhanVien }}" {{ $hopdong->MaNhanVien == $nhanvien->MaNhanVien ? 'selected' : '' }}>
                                {{ $nhanvien->HoTen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Loại Hợp Đồng -->
                <div class="form-group mb-3">
                    <label for="LoaiHopDong" class="form-label">Loại Hợp Đồng</label>
                    <input type="text" class="form-control" name="LoaiHopDong" value="{{ $hopdong->LoaiHopDong }}" required>
                </div>

                <!-- Ngày Bắt Đầu -->
                <div class="form-group mb-3">
                    <label for="NgayBatDau" class="form-label">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" name="NgayBatDau" value="{{ $hopdong->NgayBatDau }}" required>
                </div>

                <!-- Ngày Kết Thúc -->
                <div class="form-group mb-3">
                    <label for="NgayKetThuc" class="form-label">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" name="NgayKetThuc" value="{{ $hopdong->NgayKetThuc }}">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
