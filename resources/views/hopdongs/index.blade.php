@extends('layouts.admin')

@section('title', 'Danh Sách Hợp Đồng')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Danh Sách Hợp Đồng</h1>
    <a href="{{ url('/admin/hopdongs/create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm Hợp Đồng</a>
    <form action="{{ url('/admin/hopdongs') }}" method="GET" class="form-inline mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo Mã Hợp Đồng..." value="{{ request()->get('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Tìm</button>
        </div>
    </div>
</form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã Hợp Đồng</th>
                    <th>Mã Nhân Viên</th>
                    <th>Loại Hợp Đồng</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hopdongs as $hopdong)
                <tr>
                    <td>{{ $hopdong->MaHopDong }}</td>
                    <td>{{ $hopdong->nhanvien->MaNhanVien ?? 'N/A' }}</td>
                    <td>{{ $hopdong->LoaiHopDong }}</td>
                    <td>{{ $hopdong->NgayBatDau }}</td>
                    <td>{{ $hopdong->NgayKetThuc }}</td>
                    <td>
                        <a href="{{ url('/admin/hopdongs/' . $hopdong->MaHopDong . '/edit') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                        <form action="{{ url('/admin/hopdongs/' . $hopdong->MaHopDong) }}" method="POST" style="display:inline;">
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
        return confirm('Bạn có chắc chắn muốn xóa hợp đồng này?');
    }
</script>
@endsection
