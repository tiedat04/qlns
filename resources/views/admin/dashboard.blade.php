@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4 text-center">Welcome to the Admin Dashboard</h1>
    <p class="text-center">Manage your application here with ease.</p>

    <div class="row mb-4">
        <div class="col-md-12 text-right">
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg" style="border-radius: 25px;">Đăng Xuất</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row mb-4">
                <div class="col-md-4 mb-4">
                    <div class="card border-primary shadow-lg" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-users"></i> Nhân Viên</h5>
                            <p class="card-text">Quản lý danh sách nhân viên</p>
                            <a href="{{ url('/admin/nhanviens') }}" class="btn btn-light" style="border-radius: 20px;">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-info shadow-lg" style="background: linear-gradient(45deg, #1e3c72, #2a5298); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-briefcase"></i> Chức Vụ</h5>
                            <p class="card-text">Quản lý chức vụ và phòng ban</p>
                            <a href="{{ url('/admin/chucvus') }}" class="btn btn-light" style="border-radius: 20px;">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-warning shadow-lg" style="background: linear-gradient(45deg, #ffb75e, #ed8f03); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-file-signature"></i> Hợp Đồng</h5>
                            <p class="card-text">Quản lý hợp đồng của nhân viên</p>
                            <a href="{{ url('/admin/hopdongs') }}" class="btn btn-light" style="border-radius: 20px;">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-danger shadow-lg" style="background: linear-gradient(45deg, #f12711, #f5af19); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-dollar-sign"></i> Lương</h5>
                            <p class="card-text">Quản lý thông tin lương</p>
                            <a href="{{ url('/admin/luongs') }}" class="btn btn-light" style="border-radius: 20px;">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-secondary shadow-lg" style="background: linear-gradient(45deg, #636e72, #2d3436); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-building"></i> Phòng Ban</h5>
                            <p class="card-text">Quản lý phòng ban</p>
                            <a href="{{ url('/admin/phongbans') }}" class="btn btn-light" style="border-radius: 20px;">Manage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Basic styling for sidebar */
    .sidebar {
        position: fixed;
        left: 0;
        top: 56px; /* Adjust based on your header height */
        width: 250px;
        height: calc(100% - 56px);
        background-color: #f8f9fa; /* Light background color */
        padding: 15px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
        margin-bottom: 20px;
    }

    .sidebar a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .sidebar a:hover {
        background-color: #e2e2e2; /* Highlight on hover */
    }
</style>
