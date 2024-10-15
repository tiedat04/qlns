@extends('layouts.app')

@section('title', 'Chi Tiết Nhân Viên')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Thông Tin Chi Tiết Nhân Viên</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Cột trái: Thông tin nhân viên và ảnh -->
                <div class="col-md-3 text-center border-end">
                    <img src="{{ asset('anh/' . $nhanvien->AnhNhanVien) }}" 
                         alt="{{ $nhanvien->HoTen }}" 
                         class="img-fluid rounded-circle mb-3 shadow" 
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <h4 class="text-muted">{{ $nhanvien->HoTen }}</h4>
                    <p>Phòng: {{ $nhanvien->phongban->TenPhongBan ?? 'N/A' }}</p>
                    <p>Chức Vụ: {{ $nhanvien->chucvu->TenChucVu ?? 'N/A' }}</p>
                    <p>Số Điện Thoại: {{ $nhanvien->SoDienThoai }}</p>
                    <p>Ngày Sinh: {{ \Carbon\Carbon::parse($nhanvien->NgaySinh)->format('d/m/Y') }}</p>
                    <p>Địa Chỉ: {{ $nhanvien->DiaChi }}</p>
                    <p>Ngày vào làm: {{ \Carbon\Carbon::parse($nhanvien->NgayVaoLam)->format('d/m/Y') }}</p>
                </div>

                <!-- Cột phải: Thông tin chi tiết -->
                <div class="col-md-9">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#chi-tiet">Chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#phuc-loi">Hợp Đồng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ho-so">Lương</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- Tab Chi tiết -->
                        <div class="tab-pane fade show active" id="chi-tiet">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Mã Nhân Viên:</th>
                                    <td>{{ $nhanvien->MaNhanVien }}</td>
                                </tr>
                                <tr>
                                    <th>Họ Tên:</th>
                                    <td>{{ $nhanvien->HoTen }}</td>
                                </tr>
                                <tr>
                                    <th>Giới Tính:</th>
                                    <td>{{ $nhanvien->GioiTinh }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày Sinh:</th>
                                    <td>{{ \Carbon\Carbon::parse($nhanvien->NgaySinh)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Địa Chỉ:</th>
                                    <td>{{ $nhanvien->DiaChi }}</td>
                                </tr>
                                <tr>
                                    <th>Số Điện Thoại:</th>
                                    <td>{{ $nhanvien->SoDienThoai }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $nhanvien->Email }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Tab Phúc lợi -->
                        <div class="tab-pane fade" id="phuc-loi">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Mã Hợp Đồng:</th>
                                    <td>{{ optional($hopdong)->MaHopDong ?? 'Chưa có hợp đồng' }}</td>
                                </tr>
                                <tr>
                                    <th>Loại Hợp Đồng:</th>
                                    <td>{{ optional($hopdong)->LoaiHopDong ?? 'Chưa có hợp đồng' }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày Ký Hợp Đồng:</th>
                                    <td>{{ optional($hopdong)->NgayKyHD ? \Carbon\Carbon::parse($hopdong->NgayKyHD)->format('d/m/Y') : 'Chưa có ngày ký' }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày Kết Thúc:</th>
                                    <td>{{ optional($hopdong)->NgayKyHD ? \Carbon\Carbon::parse($hopdong->NgayKetThuc)->format('d/m/Y') : 'Chưa có ngày ký' }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Tab Hồ sơ -->
                        <div class="tab-pane fade" id="ho-so">
    <table class="table table-bordered">
        <tr>
            <th>Lương Cơ Bản:</th>
            <td>{{ $luong ? number_format($luong->LuongCoBan, 0, ',', '.') . ' VND' : 'Chưa có lương' }}</td>
        </tr>
        <tr>
            <th>Ngày Chấm Công:</th>
            <td>{{ $nhanvien && $nhanvien->NgayChamCongCuoi ? \Carbon\Carbon::parse($luong->NgayChamCongCuoi)->format('d/m/Y') : 'Chưa có ngày chấm công' }}</td>
        </tr>
    </table>
</div>


                    <!-- Hành Động -->
                    <div class="mt-4 d-flex justify-content-start">
                        <a href="{{ url('/admin/nhanviens/' . $nhanvien->MaNhanVien . '/edit') }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ url('/admin/nhanviens/' . $nhanvien->MaNhanVien) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                        <a href="{{ url('/admin/nhanviens') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
