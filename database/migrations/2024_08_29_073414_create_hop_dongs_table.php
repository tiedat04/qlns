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
        Schema::create('hopdong', function (Blueprint $table) {
            $table->id('MaHopDong');
            $table->unsignedBigInteger('MaNhanVien');
            $table->string('LoaiHopDong', 50);
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->timestamps();
        
            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hop_dongs');
    }
};
