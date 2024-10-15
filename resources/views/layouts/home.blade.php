<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 30px;
        }
        .hero-section {
            background-color: #343a40;
            color: white;
            padding: 50px 0;
        }
        .hero-section h1 {
            font-size: 48px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Quản trị</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container">
            <h1>Chào mừng đến với hệ thống quản lý</h1>
            <p>Quản lý nhân viên, chấm công, lương và nhiều chức năng khác một cách dễ dàng.</p>
            <a href="/admin" class="btn btn-primary btn-lg">Đến trang quản trị</a>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Giới thiệu về hệ thống</h2>
        <p>Hệ thống quản lý giúp bạn quản lý tất cả các quy trình nhân sự một cách hiệu quả và dễ dàng. Từ việc quản lý nhân viên, chấm công đến tính lương, tất cả đều được xử lý một cách tự động và chính xác.</p>
    </div>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
