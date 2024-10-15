@extends('layouts.admin')

@section('title', 'Danh Sách Nhân Viên')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Nhân Viên</h1>
    <a href="{{ url('/admin/nhanviens/create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
    
    <!-- Thanh tìm kiếm -->
    <form action="{{ url('/admin/nhanviens') }}" method="GET" class="form-inline mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo mã nhân viên..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã NV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Chức Vụ</th>
                    <th>Phòng Ban</th>
                    <th>Ngày Vào Làm</th>
                    <th>Ngày Nghỉ Việc</th>
                    <th>Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nhanviens as $nhanvien)
                <tr>
                    <td>{{ $nhanvien->MaNhanVien }}</td>
                    <td>{{ $nhanvien->HoTen }}</td>
                    <td>{{ $nhanvien->GioiTinh }}</td>
                    <td>{{ $nhanvien->NgaySinh }}</td>
                    <td>{{ $nhanvien->chucvu->TenChucVu ?? 'N/A' }}</td>
                    <td>{{ $nhanvien->phongban->TenPhongBan ?? 'N/A' }}</td>
                    <td>{{ $nhanvien->NgayVaoLam }}</td>
                    <td>{{ $nhanvien->NgayNghiViec ?? 'Chưa nghỉ việc' }}</td>
                    <td>
                        <img src="{{ asset('anh/' . $nhanvien->AnhNhanVien) }}" alt="{{ $nhanvien->HoTen }}" class="rounded-circle" style="width: 70px; height: 70px;">
                    </td>
                    <td>
                        <a href="{{ url('/admin/nhanviens/' . $nhanvien->MaNhanVien) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Xem</a>
                        <a href="{{ url('/admin/nhanviens/' . $nhanvien->MaNhanVien . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                        <form action="{{ url('/admin/nhanviens/' . $nhanvien->MaNhanVien) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDeletion();">
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

<script>
    function confirmDeletion() {
        return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');
    }
</script>
@endsection
