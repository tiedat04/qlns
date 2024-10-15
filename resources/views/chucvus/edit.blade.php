@extends('layouts.admin')

@section('title', 'Sửa Chức Vụ')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-white text-center">
            <h2 class="card-title">Sửa Thông Tin Chức Vụ</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('chucvus.update', $chucvu->MaChucVu) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- MaChucVu -->
                <div class="form-group mb-3">
                    <label for="MaChucVu" class="form-label">Mã Chức Vụ</label>
                    <input type="text" class="form-control" name="MaChucVu" value="{{ $chucvu->MaChucVu }}" readonly>
                </div>

                <!-- TenChucVu -->
                <div class="form-group mb-3">
                    <label for="TenChucVu" class="form-label">Tên Chức Vụ</label>
                    <input type="text" class="form-control" name="TenChucVu" value="{{ $chucvu->TenChucVu }}">
                </div>

                <!-- MoTa -->
                <div class="form-group mb-3">
                    <label for="MoTa" class="form-label">Mô Tả</label>
                    <textarea class="form-control" name="MoTa">{{ $chucvu->MoTa }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
