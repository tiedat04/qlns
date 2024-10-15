@extends('layouts.admin')

@section('title', 'Danh Sách Phòng Ban')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Phòng Ban</h1>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hiển thị thông báo lỗi nếu có -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-3">
    <div class="d-flex justify-content-start mb-2">
        <a href="{{ url('/admin/phongbans/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Thêm Phòng Ban</a>
    </div>
    
    <!-- Thanh tìm kiếm -->
    <form action="{{ url('/admin/phongbans') }}" method="GET" class="form-inline">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo mã hoặc tên phòng ban..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
            </div>
        </div>
    </form>
</div>


    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã Phòng Ban</th>
                    <th>Tên Phòng Ban</th>
                    <th>Mã Trưởng Phòng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phongbans as $phongban)
                <tr>
                    <td>{{ $phongban->MaPhongBan }}</td>
                    <td>{{ $phongban->TenPhongBan }}</td>
                    <td>{{ $phongban->MaTruongPhong }}</td>
                    <td>
                        <a href="{{ url('/admin/phongbans/' . $phongban->MaPhongBan . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>

                        <!-- Form Xóa -->
                        <form action="{{ url('/admin/phongbans/' . $phongban->MaPhongBan) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng ban này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $phongbans->links() }}
    </div>
</div>
@endsection
