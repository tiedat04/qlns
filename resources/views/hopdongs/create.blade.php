@extends('layouts.admin')

@section('title', 'Thêm Hợp Đồng')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Thêm Hợp Đồng Mới</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('hopdongs.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
    <label for="MaNhanVien" class="form-label">Nhân Viên</label>
    <select name="MaNhanVien" class="form-control" required>
        @foreach($nhanviens as $nhanvien)
            <option value="{{ $nhanvien->MaNhanVien }}">{{ $nhanvien->HoTen }}</option>
        @endforeach
    </select>
</div>

                <!-- Loại Hợp Đồng -->
                <div class="form-group mb-3">
                    <label for="LoaiHopDong" class="form-label">Loại Hợp Đồng</label>
                    <input type="text" class="form-control" name="LoaiHopDong" placeholder="Nhập loại hợp đồng" required>
                </div>

                <!-- Ngày Bắt Đầu -->
                <div class="form-group mb-3">
                    <label for="NgayBatDau" class="form-label">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" name="NgayBatDau" required>
                </div>

                <!-- Ngày Kết Thúc -->
                <div class="form-group mb-3">
                    <label for="NgayKetThuc" class="form-label">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" name="NgayKetThuc" >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Thêm Hợp Đồng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
