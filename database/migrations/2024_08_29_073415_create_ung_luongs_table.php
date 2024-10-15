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
        Schema::create('ungluong', function (Blueprint $table) {
            $table->id('MaUngLuong');
            $table->unsignedBigInteger('MaNhanVien');
            $table->decimal('SoTien', 15, 2);
            $table->date('NgayUng');
            $table->timestamps();
        
            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ung_luongs');
    }
};
