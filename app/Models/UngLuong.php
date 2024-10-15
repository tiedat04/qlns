<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UngLuong extends Model
{
    protected $table = 'ungluong';
    protected $primaryKey = 'MaUngLuong';
    protected $fillable = ['MaNhanVien', 'SoTien', 'NgayUngLuong','GhiChu'];
    public $timestamps = false; // Tắt tính năng tự động thêm created_at và updated_at


    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'MaNhanVien');
    }
}

