@extends('layouts.admin')

@section('title', 'Thêm Người Dùng')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Người Dùng</h1>

    <form action="{{ url('/admin/users') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="Username" required>
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <div class="form-group">
            <label for="MaNhanVien">Mã Nhân Viên</label>
            <input type="text" class="form-control" id="MaNhanVien" name="MaNhanVien" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
