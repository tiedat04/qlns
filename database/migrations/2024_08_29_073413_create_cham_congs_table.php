<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chamcong', function (Blueprint $table) {
            $table->id('MaChamCong');
            $table->unsignedBigInteger('MaNhanVien');
            $table->date('NgayChamCong');
            $table->time('GioVao');
            $table->time('GioRa');
            $table->string('TrangThai', 50)->nullable();
            $table->timestamps();
        
            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cham_congs');
    }
};
