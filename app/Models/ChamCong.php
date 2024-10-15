<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamCong extends Model
{
    use HasFactory;
 public $timestamps = false;
    protected $table = 'chamcong';  // Tên bảng chấm công
    protected $primaryKey = 'MaChamCong'; // Khóa chính
    protected $fillable = ['MaNhanVien', 'Ngay', 'Tong']; // Các trường cần thiết

    // Liên kết với bảng nhân viên
    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNhanVien');
    }
}

