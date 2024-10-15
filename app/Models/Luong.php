<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'luong';
    protected $primaryKey = 'MaLuong';
    protected $fillable = ['MaNhanVien', 'Thang','Nam','LuongCoBan', 'Thuong', 'KhauTru', 'TongLuong'];

    // Liên kết với mô hình nhân viên
    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'MaNhanVien');
    }
}
