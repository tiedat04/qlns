@extends('layouts.admin')

@section('title', 'Thêm Ứng Lương')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Ứng Lương</h1>

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

    <form action="{{ route('ungluongs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="MaNhanVien">Mã Nhân Viên</label>
            <input type="text" class="form-control @error('MaNhanVien') is-invalid @enderror" id="MaNhanVien" name="MaNhanVien" value="{{ old('MaNhanVien') }}" required>
            @error('MaNhanVien')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="SoTien">Số Tiền Ứng</label>
            <input type="number" class="form-control @error('SoTien') is-invalid @enderror" id="SoTien" name="SoTien" value="{{ old('SoTien') }}" required>
            @error('SoTien')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="NgayUngLuong">Ngày Ứng</label>
            <input type="date" class="form-control @error('NgayUngLuong') is-invalid @enderror" id="NgayUngLuong" name="NgayUngLuong" value="{{ old('NgayUngLuong') }}" required>
            @error('NgayUngLuong')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="GhiChu">Ghi Chú</label>
            <textarea class="form-control @error('GhiChu') is-invalid @enderror" id="GhiChu" name="GhiChu">{{ old('GhiChu') }}</textarea>
            @error('GhiChu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm Ứng Lương</button>
    </form>
</div>
@endsection
