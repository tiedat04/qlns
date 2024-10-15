<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Đảm bảo không có phần tử nào bị tràn khỏi màn hình */
            background: linear-gradient(135deg, #74ebd5, #acb6e5); /* Nền gradient hiện đại */
        }

        /* Hiệu ứng lướt sóng */
        .wave-container {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 180px; /* Chiều cao của phần sóng */
            background: linear-gradient(180deg, rgba(255, 255, 255, 0), #acb6e5); /* Hiệu ứng gradient từ trong suốt đến xanh pastel */
        }

        .wave {
            position: absolute;
            left: 50%;
            top: 0;
            width: 200%;
            height: 100%;
            background-repeat: repeat-x; /* Chỉ lặp theo trục X */
            background-size: 50% 180px; /* Kích thước sóng phù hợp */
            opacity: 0.8;
            animation: wave 5s linear infinite;
        }

        .wave:nth-child(1) {
            background-image: url('https://svgshare.com/i/hcz.svg'); /* Đường sóng */
            z-index: 1000;
            opacity: 0.5;
            animation-delay: 0s;
            animation-duration: 8s;
        }

        .wave:nth-child(2) {
            background-image: url('https://svgshare.com/i/hcz.svg');
            z-index: 999;
            opacity: 0.3;
            animation-delay: -4s;
            animation-duration: 10s;
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
            background-color: rgba(255, 255, 255, 0.9); /* Làm cho màu nền của thẻ rõ ràng hơn */
            border: none;
            border-radius: 15px; /* Làm góc thẻ bo tròn mềm mại hơn */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Thêm hiệu ứng đổ bóng mềm mại */
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .card:hover {
            transform: translateY(-5px); /* Tạo hiệu ứng nâng thẻ lên khi hover */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3); /* Tăng cường hiệu ứng đổ bóng khi hover */
        }

        button {
            background: linear-gradient(90deg, #667eea, #764ba2); /* Nút bấm gradient */
            border: none;
            transition: background-color 0.4s ease, transform 0.4s ease;
            color: white;
        }

        button:hover {
            background: linear-gradient(90deg, #764ba2, #667eea); /* Hiệu ứng hover cho nút */
            transform: scale(1.05); /* Tạo hiệu ứng phóng to nhẹ khi hover */
        }
        
        
    </style>
</head>
<body>
    <!-- Sóng lướt -->
    <div class="wave-container">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Đăng Nhập</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="Username" name="Username" value="{{ old('Username') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="Password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="Password" name="Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                        </form>

                        <div class="mt-3 text-center">
                            <p>Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
