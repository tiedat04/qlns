<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\ChamCongController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\UngLuongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;

// Route mặc định, điều hướng đến trang đăng nhập
Route::get('/', function () {
    return redirect()->route('login');
});
// Route chính, trả về view dashboard của admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// NhanVien Routes
Route::prefix('admin/nhanviens')->group(function () {
    
    // Danh sách nhân viên
    Route::get('/', [NhanVienController::class, 'index'])->name('nhanviens.index');

    // Tạo nhân viên mới
    Route::get('/create', [NhanVienController::class, 'create'])->name('nhanviens.create');

    // Chi tiết nhân viên
    Route::get('/{MaNhanVien}', [NhanVienController::class, 'show'])->name('nhanviens.show');

    // Sửa nhân viên
    Route::get('/{MaNhanVien}/edit', [NhanVienController::class, 'edit'])->name('nhanviens.edit');

    // Cập nhật thông tin nhân viên
    Route::put('/{MaNhanVien}', [NhanVienController::class, 'update'])->name('nhanviens.update');

    // Xóa nhân viên
    Route::delete('/{MaNhanVien}', [NhanVienController::class, 'destroy'])->name('nhanviens.destroy');
});


// Route để xử lý việc thêm mới nhân viên nằm ngoài nhóm prefix
Route::post('/admin/nhanviens', [NhanVienController::class, 'store'])->name('nhanviens.store');


// ChamCong Routes
// In routes/web.php
Route::post('/admin/nhanviens/{id}/chamcong', [ChamCongController::class, 'chamCong']);

Route::get('/admin/chamcongs', [ChamCongController::class, 'index'])->name('chamcongs.index');
Route::get('/admin/chamcongs/create', [ChamCongController::class, 'create'])->name('chamcongs.create');
Route::post('/admin/chamcongs', [ChamCongController::class, 'store'])->name('chamcongs.store');
Route::get('/admin/chamcongs/{id}/edit', [ChamCongController::class, 'edit'])->name('chamcongs.edit');
Route::put('/admin/chamcongs/{id}', [ChamCongController::class, 'update'])->name('chamcongs.update');
Route::delete('/admin/chamcongs/{id}', [ChamCongController::class, 'destroy'])->name('chamcongs.destroy');


// ChucVu Routes
Route::prefix('admin/chucvus')->group(function () {
    Route::get('/', [ChucVuController::class, 'index'])->name('chucvus.index');
    Route::get('/create', [ChucVuController::class, 'create'])->name('chucvus.create');
    Route::post('/', [ChucVuController::class, 'store'])->name('chucvus.store');
    Route::get('/{id}', [ChucVuController::class, 'show'])->name('chucvus.show');
    Route::get('/{id}/edit', [ChucVuController::class, 'edit'])->name('chucvus.edit');
    Route::put('/{id}', [ChucVuController::class, 'update'])->name('chucvus.update');
    Route::delete('/{id}', [ChucVuController::class, 'destroy'])->name('chucvus.destroy');
});

// HopDong Routes
Route::prefix('admin/hopdongs')->group(function () {
    Route::get('/', [HopDongController::class, 'index'])->name('hopdongs.index');
    Route::get('/create', [HopDongController::class, 'create'])->name('hopdongs.create');
    Route::post('/', [HopDongController::class, 'store'])->name('hopdongs.store');
    Route::get('/{id}', [HopDongController::class, 'show'])->name('hopdongs.show');
    Route::get('/{id}/edit', [HopDongController::class, 'edit'])->name('hopdongs.edit');
    Route::put('/{id}', [HopDongController::class, 'update'])->name('hopdongs.update');
    Route::delete('/{id}', [HopDongController::class, 'destroy'])->name('hopdongs.destroy');
});

// Luong Routes
Route::prefix('admin/luongs')->group(function () {
    Route::get('/', [LuongController::class, 'index'])->name('luongs.index');
    Route::get('/create', [LuongController::class, 'create'])->name('luongs.create');
    Route::post('/', [LuongController::class, 'store'])->name('luongs.store');
    Route::get('/{id}', [LuongController::class, 'show'])->name('luongs.show');
    Route::get('/{id}/edit', [LuongController::class, 'edit'])->name('luongs.edit');
    Route::put('/luongs/{MaLuong}', [LuongController::class, 'update'])->name('luongs.update');
    Route::delete('/admin/luongs/{luong}', [LuongController::class, 'destroy'])->name('luongs.destroy');
});

// PhongBan Routes
Route::prefix('admin/phongbans')->group(function () {
    Route::get('/', [PhongBanController::class, 'index'])->name('phongbans.index');
    Route::get('/create', [PhongBanController::class, 'create'])->name('phongbans.create');
    Route::post('/', [PhongBanController::class, 'store'])->name('phongbans.store');
    Route::get('/{id}/edit', [PhongBanController::class, 'edit'])->name('phongbans.edit');
    Route::put('/{id}', [PhongBanController::class, 'update'])->name('phongbans.update');
    Route::delete('/{id}', [PhongBanController::class, 'destroy'])->name('phongbans.destroy');
});


// UngLuong Routes
Route::prefix('admin/ungluongs')->group(function () {
    Route::get('/', [UngLuongController::class, 'index'])->name('ungluongs.index');
    Route::get('/create', [UngLuongController::class, 'create'])->name('ungluongs.create');
    Route::post('/', [UngLuongController::class, 'store'])->name('ungluongs.store');
    Route::get('/{id}', [UngLuongController::class, 'show'])->name('ungluongs.show');
    Route::get('/{id}/edit', [UngLuongController::class, 'edit'])->name('ungluongs.edit');
    Route::put('/{id}', [UngLuongController::class, 'update'])->name('ungluongs.update');
    Route::delete('/{id}', [UngLuongController::class, 'destroy'])->name('ungluongs.destroy');
});

// User Routes
Route::prefix('admin/users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/', [UsersController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'register'])->name('user.register');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route để xử lý đăng nhập
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route để hiển thị chi tiết nhân viên sau khi đăng nhập
Route::get('/nhanvien/{id}', [NhanVienController::class, 'show'])->name('nhanvien.detail');
Route::get('/nhanvien1/{id}', [NhanVienController::class, 'show1'])->name('nhanvien.detail1');

Route::post('/admin/nhanviens/{id}/chamcong', [NhanVienController::class, 'chamCong']);


// Định nghĩa route cho dashboard của admin
// Route cho trang admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route cho trang home với tham số UserID
Route::get('layouts/home/{id}', [HomeController::class, 'index'])->name('layouts.home');
