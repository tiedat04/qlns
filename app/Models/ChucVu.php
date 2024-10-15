<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chucvu';
    protected $primaryKey = 'MaChucVu';
    protected $fillable = ['TenChucVu'];

    public function nhanviens()
    {
        return $this->hasMany(Nhanvien::class, 'MaChucVu');
    }

    public $timestamps = false;
}
