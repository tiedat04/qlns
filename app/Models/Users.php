<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'UserID';
    public $timestamps = true; // This is enabled by default, but you can explicitly set it
    
    protected $fillable = ['Username', 'Password', 'MaNhanVien', 'Role'];

    // Optionally, specify the names of the timestamp columns if they are different
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';
}
