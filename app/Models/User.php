<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'Username', 'Password', 'MaNhanVien', 'Role'
    ];

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }

    // Đặt mặc định giá trị Role nếu không được chỉ định
    public function setRoleAttribute($value)
    {
        $this->attributes['Role'] = $value ?? 'user';
    }
}
