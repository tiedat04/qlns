@extends('layouts.admin')

@section('title', 'Danh Sách Ứng Lương')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Ứng Lương</h1>
    
    <div class="mb-3 text-right">
        <a href="{{ route('ungluongs.create') }}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Thêm Ứng Lương</a>
    </div>
    <form action="{{ url('/admin/ungluongs') }}" method="GET" class="form-inline mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo Mã Ứng Lương..." value="{{ request()->get('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
        </div>
    </div>
</form>


    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mã Ứng Lương</th>
                <th>Mã Nhân Viên</th>
                <th>Ngày Ứng Lương</th>
                <th>Số Tiền</th>
                <th>Ghi Chú</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ungluongs as $ungluong)
            <tr>
                <td>{{ $ungluong->MaUngLuong }}</td> <!-- Hiển thị Mã Ứng Lương -->
                <td>{{ $ungluong->MaNhanVien }}</td> <!-- Hiển thị Mã Nhân Viên -->
                <td>{{ \Carbon\Carbon::parse($ungluong->NgayUngLuong)->format('d/m/Y') }}</td> <!-- Hiển thị Ngày Ứng Lương -->
                <td>{{ number_format($ungluong->SoTien, 2) }} VNĐ</td> <!-- Hiển thị Số Tiền -->
                <td>{{ $ungluong->GhiChu }}</td> <!-- Hiển thị Ghi Chú -->
                <td>
                    <a href="{{ url('/admin/ungluongs/' . $ungluong->MaUngLuong . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                    <form action="{{ url('/admin/ungluongs/' . $ungluong->MaUngLuong) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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

@section('scripts')
<script>
    function confirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa bản ghi này không?');
    }
</script>
@endsection
@endsection
