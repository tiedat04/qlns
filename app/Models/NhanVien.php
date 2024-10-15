<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien'; // Tên bảng
    protected $primaryKey = 'MaNhanVien'; // Khóa chính
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'MaNhanVien',
        'HoTen',
        'GioiTinh',
        'NgaySinh',
        'DiaChi',
        'SoDienThoai',
        'Email',
        'MaPhongBan',
        'MaChucVu',
        'NgayVaoLam',
        'NgayNghiViec',
        'AnhNhanVien',
        'TongCong',
        'NgayChamCongCuoi', // Thêm trường Tổng Công
    ];

    public function phongban() {
        return $this->belongsTo(Phongban::class, 'MaPhongBan');
    }

    public function chucvu() {
        return $this->belongsTo(Chucvu::class, 'MaChucVu');
    }
}
