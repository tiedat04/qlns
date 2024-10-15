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
        Schema::create('luong', function (Blueprint $table) {
            $table->id('MaLuong');
            $table->unsignedBigInteger('MaNhanVien');
            $table->decimal('LuongCoBan', 15, 2);
            $table->decimal('PhuCap', 15, 2)->nullable();
            $table->decimal('Thuong', 15, 2)->nullable();
            $table->timestamps();
        
            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luongs');
    }
};
