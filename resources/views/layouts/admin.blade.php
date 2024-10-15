<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa; /* Nền sáng hơn để dễ nhìn */
        }

        .sidebar {
            background-color: #343a40; /* Màu nền tối cho sidebar */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Đổ bóng cho sidebar */
            animation: slideInLeft 0.5s ease forwards; /* Hiệu ứng đổ vào cho sidebar */
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .sidebar h4 {
            color: #ffffff; /* Màu chữ trắng cho tiêu đề */
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #ffffff; /* Màu chữ trắng cho liên kết */
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px; /* Bo tròn góc cho liên kết */
            transition: background-color 0.3s; /* Hiệu ứng chuyển màu mượt mà */
        }

        .sidebar a:hover {
            background-color: #495057; /* Màu nền tối hơn khi hover */
            color: #ffffff; /* Giữ màu chữ trắng khi hover */
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #ffffff; /* Nền sáng cho nội dung chính */
            border-radius: 10px; /* Bo tròn góc cho nội dung chính */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho nội dung chính */
            animation: fadeIn 0.5s ease forwards; /* Hiệu ứng đổ vào cho nội dung chính */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px); /* Hiệu ứng dịch chuyển nhẹ lên trên */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar {
            margin-left: 250px;
        }

        .navbar-brand {
            font-size: 1.5rem; /* Tăng kích thước chữ cho tiêu đề */
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Màu chữ trắng cho các liên kết trong navbar */
        }

        .navbar-nav .nav-link:hover {
            color: #adb5bd; /* Màu chữ sáng hơn khi hover */
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                height: auto;
                width: 100%;
                padding-top: 10px;
            }

            .main-content {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/admin') }}">Trang Quản Trị</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Add any additional navbar items here -->
            </ul>
        </div>
    </nav>

    <div class="sidebar">
        <h4>Dashboard</h4>
        <a href="{{ url('/admin/nhanviens') }}"><i class="fas fa-users"></i> Nhân Viên</a>
        <a href="{{ url('/admin/chucvus') }}"><i class="fas fa-briefcase"></i> Chức Vụ</a>
        <a href="{{ url('/admin/hopdongs') }}"><i class="fas fa-file-signature"></i> Hợp Đồng</a>
        <a href="{{ url('/admin/luongs') }}"><i class="fas fa-dollar-sign"></i> Lương</a>
        <a href="{{ url('/admin/phongbans') }}"><i class="fas fa-building"></i> Phòng Ban</a>
        <a href="{{ url('/admin/ungluongs') }}"><i class="fas fa-hand-holding-usd"></i> Ứng Lương</a>
        <a href="{{ url('/admin/users') }}"><i class="fas fa-user-cog"></i> Users</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <!-- Add Bootstrap JS and any other JS frameworks -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
