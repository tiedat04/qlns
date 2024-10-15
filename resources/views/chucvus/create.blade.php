@extends('layouts.admin')

@section('title', 'Thêm Chức Vụ')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Thêm Chức Vụ Mới</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('chucvus.store') }}" method="POST">
                @csrf

                <!-- Tên Chức Vụ -->
                <div class="form-group mb-3">
                    <label for="TenChucVu" class="form-label">Tên Chức Vụ</label>
                    <input type="text" class="form-control" name="TenChucVu" placeholder="Nhập tên chức vụ" required>
                </div>

                <!-- Mô Tả -->
                <div class="form-group mb-3">
                    <label for="MoTa" class="form-label">Mô Tả</label>
                    <textarea class="form-control" name="MoTa" rows="4" placeholder="Nhập mô tả chức vụ"></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Thêm Chức Vụ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
