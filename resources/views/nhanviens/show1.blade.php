@extends('layouts.app')

@section('title', 'Chi Tiết Nhân Viên')

@section('content')
<body>
    <div class="wave-container">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-secondary text-white text-center">
                <h2 class="card-title">Thông Tin Nhân Viên</h2>
            </div>

            <!-- Thông báo chấm công thành công -->
            <div id="successMessage" class="alert alert-success text-center mt-3 mx-3" style="display:none;">
                Chấm công thành công!
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Ảnh Nhân Viên -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('anh/' . $nhanvien->AnhNhanVien) }}" 
                             alt="{{ $nhanvien->HoTen }}" 
                             class="img-fluid rounded-circle mb-3 shadow" 
                             style="width: 300px; height: 300px; object-fit: cover;">
                        <h4 class="text-muted">{{ $nhanvien->HoTen }}</h4>
                    </div>

                    <!-- Thông Tin -->
                    <div class="col-md-8">
                        <form id="employeeInfoForm">
                            <div class="form-group">
                                <label for="hoTen">Họ Tên:</label>
                                <input type="text" id="hoTen" class="form-control" value="{{ $nhanvien->HoTen }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gioiTinh">Giới Tính:</label>
                                <input type="text" id="gioiTinh" class="form-control" value="{{ $nhanvien->GioiTinh }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="ngaySinh">Ngày Sinh:</label>
                                <input type="text" id="ngaySinh" class="form-control" value="{{ \Carbon\Carbon::parse($nhanvien->NgaySinh)->format('d/m/Y') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="chucVu">Chức Vụ:</label>
                                <input type="text" id="chucVu" class="form-control" value="{{ $nhanvien->chucvu->TenChucVu ?? 'N/A' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phongBan">Phòng Ban:</label>
                                <input type="text" id="phongBan" class="form-control" value="{{ $nhanvien->phongban->TenPhongBan ?? 'N/A' }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="soDienThoai">Số Điện Thoại:</label>
                                <input type="text" id="soDienThoai" class="form-control" value="{{ $nhanvien->SoDienThoai }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="diaChi">Địa Chỉ:</label>
                                <input type="text" id="diaChi" class="form-control" value="{{ $nhanvien->DiaChi }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tongCong">Tổng Công:</label> <!-- Thêm trường Tổng Công -->
                                <input type="text" id="tongCong" class="form-control" value="{{ $nhanvien->TongCong }}" readonly>
                                <div class="form-group">
                                <label for="tongCong">Ngày Chấm Công Cuối :</label> <!-- Thêm trường Tổng Công -->
                                <input type="text" id="tongCong" class="form-control" value="{{ $nhanvien->NgayChamCongCuoi }}" readonly>
                            </div>
                            </div>
                        </form>

                        <!-- Hành Động -->
                        <div class="mt-4 d-flex justify-content-center">
                            <!-- Nút Chấm Công -->
                            <button id="btnChamCong" class="btn btn-danger w-100 btn-lg">
                                <i class="fas fa-clock"></i> Chấm Công
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm script xử lý AJAX cho chức năng chấm công -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $('#btnChamCong').click(function(e) {
        e.preventDefault(); // Prevent page reload

        var nhanVienId = "{{ $nhanvien->MaNhanVien }}"; // Get employee ID

        $.ajax({
            url: '/admin/nhanviens/' + nhanVienId + '/chamcong',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Security token
            },
            success: function(response) {
                // Show success message
                $('#successMessage').fadeIn().delay(2000).fadeOut();

                // Update total work count
                var tongCong = parseInt($('#tongCong').val());
                $('#tongCong').val(tongCong + 1); // Increment total work count by 1
            },
            error: function(xhr) {
                // Check if the error is due to double clock-in
                if (xhr.status === 400) {
                    // Display error message
                    alert(xhr.responseJSON.error || 'Bạn đã chấm công hôm nay.'); // Show the specific error message returned from the server
                } else {
                    alert('Đã xảy ra lỗi khi chấm công.'); // Generic error message for other errors
                }
            }
        });
    });
});
</script>

</body>
@endsection

<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow: hidden; /* Đảm bảo không có phần tử nào bị tràn khỏi màn hình */
        background: linear-gradient(135deg, #ff7e5f, #feb47b); /* Nền gradient tươi sáng */
    }

    /* Hiệu ứng sóng */
    .wave {
        position: absolute;
        left: 50%;
        top: 0;
        width: 200%;
        height: 100%;
        background-repeat: repeat-x; /* Chỉ lặp theo trục X */
        background-size: 50% 180px; /* Kích thước sóng phù hợp */
        opacity: 0.6;
        animation: wave 5s linear infinite;
    }

    @keyframes wave {
        0% {
            transform: translateX(-50%);
        }
        100% {
            transform: translateX(0);
        }
    }

    .card {
        z-index: 10;
        background-color: rgba(255, 255, 255, 0.95); /* Làm cho màu nền của thẻ rõ ràng hơn */
        border: none;
        border-radius: 20px; /* Làm góc thẻ bo tròn mềm mại hơn */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Thêm hiệu ứng đổ bóng mềm mại */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px); /* Tạo hiệu ứng nâng thẻ lên khi hover */
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4); /* Tăng cường hiệu ứng đổ bóng khi hover */
    }

    /* Cải thiện thiết kế bảng thông tin */
    form {
        margin: 20px 0; /* Giãn cách trên và dưới cho form */
    }

    label {
        font-weight: bold; /* Làm nổi bật label */
    }

    .form-control {
        font-size: 1.1rem; /* Tăng kích thước chữ cho input */
        padding: 10px; /* Thêm khoảng cách trong input */
    }

    button {
        transition: transform 0.3s ease;
        font-size: 1.25rem; /* Kích thước chữ trong nút */
    }

    button:hover {
        transform: scale(1.05); /* Tạo hiệu ứng phóng to nhẹ khi hover */
    }
</style>
