<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{

    public $timestamps = false; 
    protected $table = 'hopdong';
    protected $primaryKey = 'MaHopDong';
    protected $fillable = ['MaNhanVien', 'LoaiHopDong', 'NgayBatDau', 'NgayKetThuc'];

    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'MaNhanVien');
    }
}

