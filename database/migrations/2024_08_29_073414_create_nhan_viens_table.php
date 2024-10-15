<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id('MaNhanVien');
            $table->string('HoTen', 100)->nullable();
            $table->string('GioiTinh', 10)->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('DiaChi', 100)->nullable();
            $table->string('SoDienThoai', 20)->nullable();
            $table->string('Email', 50)->nullable();
            $table->unsignedBigInteger('MaPhongBan')->nullable();
            $table->unsignedBigInteger('MaChucVu')->nullable();
            $table->date('NgayVaoLam')->nullable();
            $table->date('NgayNghiViec')->nullable();
            $table->binary('AnhNhanVien')->nullable();
            $table->timestamps();
        
            $table->foreign('MaPhongBan')->references('MaPhongBan')->on('phongban');
            $table->foreign('MaChucVu')->references('MaChucVu')->on('chucvu');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
