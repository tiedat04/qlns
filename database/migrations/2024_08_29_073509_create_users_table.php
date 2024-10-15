<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->unsignedBigInteger('MaNhanVien')->nullable();
            $table->enum('Role', ['admin', 'employee'])->default('employee');
            $table->timestamps();

            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanviens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

