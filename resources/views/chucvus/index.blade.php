@extends('layouts.admin')

@section('title', 'Chức Vụ')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Chức Vụ</h1>
    
    

    <a href="{{ url('/admin/chucvus/create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm Chức Vụ</a>
    <!-- Thanh tìm kiếm -->
    <form action="{{ url('/admin/chucvus') }}" method="GET" class="form-inline mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo mã chức vụ..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã Chức Vụ</th>
                    <th>Tên Chức Vụ</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chucvus as $chucvu)
                <tr>
                    <td>{{ $chucvu->MaChucVu }}</td>
                    <td>{{ $chucvu->TenChucVu }}</td>
                    <td>{{ $chucvu->MoTa }}</td>
                    <td>
                        <a href="{{ url('/admin/chucvus/' . $chucvu->MaChucVu . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                        <form action="{{ url('/admin/chucvus/' . $chucvu->MaChucVu) }}" method="POST" style="display:inline;">
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
        return confirm('Bạn có chắc chắn muốn xóa chức vụ này?');
    }
</script>
@endsection
