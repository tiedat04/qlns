@extends('layouts.admin')

@section('title', 'Sửa Lương')

@section('content')
<div class="container">
    <h1 class="mb-4">Sửa Lương</h1>

    <form action="{{ route('luongs.update', $luong->MaLuong) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="MaNhanVien">Nhân Viên</label>
    <select class="form-control" id="MaNhanVien" name="MaNhanVien" disabled>
        @foreach($nhanviens as $nhanvien)
            <option value="{{ $nhanvien->MaNhanVien }}" {{ $nhanvien->MaNhanVien == $luong->MaNhanVien ? 'selected' : '' }}>
                {{ $nhanvien->HoTen }}
            </option>
        @endforeach
    </select>
</div>
    <div class="form-group">
        <label for="Thang">Tháng</label>
        <input type="number" class="form-control" id="Thang" name="Thang" value="{{ $luong->Thang }}" required>
    </div>
    <div class="form-group">
        <label for="Nam">Năm</label>
        <input type="number" class="form-control" id="Nam" name="Nam" value="{{ $luong->Nam }}" required>
    </div>
    <div class="form-group">
        <label for="LuongCoBan">Lương Cơ Bản</label>
        <input type="number" class="form-control" id="LuongCoBan" name="LuongCoBan" value="{{ $luong->LuongCoBan }}" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="Thuong">Thưởng</label>
        <input type="number" class="form-control" id="Thuong" name="Thuong" value="{{ $luong->Thuong }}" step="0.01">
    </div>
    <div class="form-group">
        <label for="KhauTru">Khấu Trừ</label>
        <input type="number" class="form-control" id="KhauTru" name="KhauTru" value="{{ $luong->KhauTru }}" step="0.01">
    </div>
    <div class="form-group">
        <label for="TongLuong">Tổng Lương</label>
        <input type="text" class="form-control" id="TongLuong" name="TongLuong" value="{{ number_format($luong->TongLuong, 2, ',', '.') }}" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
</form>

</div>

<!-- Thêm script xử lý tính toán tổng lương -->
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
    });document.addEventListener('DOMContentLoaded', function() {
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
