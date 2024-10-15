<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    // Đặt tên bảng
    protected $table = 'phongban';

    // Đặt khóa chính
    protected $primaryKey = 'MaPhongBan';

    // Vô hiệu hóa timestamps
    public $timestamps = false;

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['TenPhongBan', 'MaTruongPhong'];

    // Định nghĩa quan hệ với model NhanVien
    public function nhanviens()
    {
        return $this->hasMany(NhanVien::class, 'MaPhongBan', 'MaPhongBan');
    }
}
