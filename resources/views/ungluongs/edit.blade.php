@extends('layouts.admin')

@section('title', 'Sửa Ứng Lương')

@section('content')
<div class="container">
    <h1 class="mb-4">Sửa Ứng Lương</h1>

    <!-- Hiển thị thông báo lỗi tổng quát nếu có -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ungluongs.update', $ungluong->MaUngLuong) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="MaNhanVien">Mã Nhân Viên</label>
            <input type="text" class="form-control @error('MaNhanVien') is-invalid @enderror" id="MaNhanVien" name="MaNhanVien" value="{{ old('MaNhanVien', $ungluong->MaNhanVien) }}" required>
            @error('MaNhanVien')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="SoTien">Số Tiền Ứng</label>
            <input type="number" class="form-control @error('SoTien') is-invalid @enderror" id="SoTien" name="SoTien" value="{{ old('SoTien', $ungluong->SoTien) }}" required>
            @error('SoTien')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="NgayUngLuong">Ngày Ứng</label>
            <input type="date" class="form-control @error('NgayUngLuong') is-invalid @enderror" id="NgayUngLuong" name="NgayUngLuong" value="{{ old('NgayUngLuong', $ungluong->NgayUngLuong) }}" required>
            @error('NgayUngLuong')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="GhiChu">Ghi Chú</label>
            <textarea class="form-control @error('GhiChu') is-invalid @enderror" id="GhiChu" name="GhiChu">{{ old('GhiChu', $ungluong->GhiChu) }}</textarea>
            @error('GhiChu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection
