@extends('layouts.admin')

@section('title', 'Sửa Người Dùng')

@section('content')
<div class="container">
    <h1 class="mb-4">Sửa Người Dùng</h1>

    <form action="{{ route('users.update', $user->UserID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" value="{{ $user->Username }}" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
            <small class="form-text text-muted">Để trống nếu không thay đổi.</small>
        </div>
        <div class="form-group">
            <label for="MaNhanVien">Mã Nhân Viên</label>
            <input type="text" class="form-control" id="MaNhanVien" name="MaNhanVien" value="{{ $user->MaNhanVien }}" required>
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select class="form-control" id="Role" name="Role" required>
                <option value="nhan vien" {{ $user->Role === 'user' ? 'selected' : '' }}>user</option>
                <option value="admin" {{ $user->Role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection
