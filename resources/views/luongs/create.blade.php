@extends('layouts.admin')

@section('title', 'Thêm Lương')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm Lương</h1>

    <form action="{{ url('/admin/luongs') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="MaNhanVien">Nhân Viên</label>
        <select class="form-control" id="MaNhanVien" name="MaNhanVien" required>
            <option value="">Chọn nhân viên</option>
            @foreach($nhanviens as $nhanvien)
                <option value="{{ $nhanvien->MaNhanVien }}">{{ $nhanvien->HoTen }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Thang">Tháng</label>
        <input type="number" class="form-control" id="Thang" name="Thang" required>
    </div>
    <div class="form-group">
        <label for="Nam">Năm</label>
        <input type="number" class="form-control" id="Nam" name="Nam" required>
    </div>
    <div class="form-group">
        <label for="LuongCoBan">Lương Cơ Bản</label>
        <input type="number" class="form-control" id="LuongCoBan" name="LuongCoBan" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="Thuong">Thưởng</label>
        <input type="number" class="form-control" id="Thuong" name="Thuong" step="0.01">
    </div>
    <div class="form-group">
        <label for="KhauTru">Khấu Trừ</label>
        <input type="number" class="form-control" id="KhauTru" name="KhauTru" step="0.01">
    </div>
    <div class="form-group">
        <label for="TongLuong">Tổng Lương</label>
        <input type="text" class="form-control" id="TongLuong" name="TongLuong" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function calculateTotalSalary() {
            const luongCoBan = parseFloat(document.getElementById('LuongCoBan').value) || 0;
            const thuong = parseFloat(document.getElementById('Thuong').value) || 0;
            const khauTru = parseFloat(document.getElementById('KhauTru').value) || 0;
            const tongLuong = luongCoBan + thuong - khauTru;
            document.getElementById('TongLuong').value = tongLuong.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        }

        document.getElementById('LuongCoBan').addEventListener('input', calculateTotalSalary);
        document.getElementById('Thuong').addEventListener('input', calculateTotalSalary);
        document.getElementById('KhauTru').addEventListener('input', calculateTotalSalary);

        // Call the function initially to set the value if editing an existing record
        calculateTotalSalary();
    });
</script>
@endsection
