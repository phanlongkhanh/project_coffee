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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên Sản Phẩm');
            $table->string(column: 'image')->default(value: 'profile.jpg');
            $table->unsignedBigInteger('amount')->comment('Số lượng');
            $table->unsignedBigInteger('price')->comment('Giá tiền');
            $table->unsignedBigInteger('id_category_menu')->comment('Danh Mục');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
