@extends('layouts.admin')

@section('title', 'Danh Sách Lương')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Lương</h1>
    <a href="{{ url('/admin/luongs/create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm Lương</a>
    <form action="{{ url('/admin/luongs') }}" method="GET" class="form-inline mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo Mã Lương..." value="{{ request()->get('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
        </div>
    </div>
</form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã Lương</th>
                    <th>Họ Tên Nhân Viên</th> <!-- Thêm cột Họ Tên -->
                    <th>Tháng</th>
                    <th>Năm</th>
                    <th>Lương Cơ Bản</th>
                    <th>Thưởng</th>
                    <th>Khấu Trừ</th>
                    <th>Tổng Lương</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($luongs as $luong)
                <tr>
                    <td>{{ $luong->MaLuong }}</td>
                    <td>{{ $luong->nhanvien->HoTen ?? 'Không xác định' }}</td> <!-- Hiển thị tên nhân viên -->
                    <td>{{ $luong->Thang }}</td>
                    <td>{{ $luong->Nam }}</td>
                    <td>{{ number_format($luong->LuongCoBan, 2) }}</td>
                    <td>{{ number_format($luong->Thuong, 2) }}</td>
                    <td>{{ number_format($luong->KhauTru, 2) }}</td>
                    <td>{{ number_format($luong->TongLuong, 2) }}</td>
                    <td>
                        <a href="{{ url('/admin/luongs/' . $luong->MaLuong . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                        <form action="{{ route('luongs.destroy', $luong->MaLuong) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">
        <i class="fas fa-trash"></i> Xóa
    </button>
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
