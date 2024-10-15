<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Add Bootstrap or any other CSS framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">My Laravel App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/nhanviens') }}">Nhân Viên</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/chamcongs') }}">Chấm Công</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/chucvus') }}">Chức Vụ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/hopdongs') }}">Hợp Đồng</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/luongs') }}">Lương</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/phongbans') }}">Phòng Ban</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/ungluongs') }}">Ứng Lương</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Users</a></li>
            </ul>
        </div>
    </nav> -->

    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Add Bootstrap JS and any other JS frameworks -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
