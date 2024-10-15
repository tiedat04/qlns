@extends('layouts.admin')

@section('title', 'Danh Sách Người Dùng')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Người Dùng</h1>
    
    <div class="mb-3 text-right">
        <a href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Thêm Người Dùng</a>
    </div>
    <form action="{{ url('/admin/users') }}" method="GET" class="form-inline mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo UserID..." value="{{ request()->get('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
        </div>
    </div>
</form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Mã Nhân Viên</th>
                <th>Role</th>
                <th>Ngày Tạo</th>
                <th>Ngày Cập Nhật</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->UserID }}</td>
                <td>{{ $user->Username }}</td>
                <td>{{ $user->MaNhanVien }}</td>
                <td>{{ $user->Role }}</td>
                <td>{{ \Carbon\Carbon::parse($user->CreatedAt)->format('d/m/Y H:i') }}</td> <!-- Định dạng Ngày Tạo -->
                <td>{{ \Carbon\Carbon::parse($user->UpdatedAt)->format('d/m/Y H:i') }}</td> <!-- Định dạng Ngày Cập Nhật -->
                <td>
                    <a href="{{ url('/admin/users/' . $user->UserID . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                    <form action="{{ url('/admin/users/' . $user->UserID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"><i class="fas fa-trash"></i> Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
