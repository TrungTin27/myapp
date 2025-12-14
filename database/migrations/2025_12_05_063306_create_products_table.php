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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID vaf khóa chính

            $table->string('name'); // Tên sản phẩm / tên món ăn 
            $table->string('image')->nullable(); // Ảnh đại diện
            $table->integer('price')->default(0); // Giá sản phẩm , sử dụng interger 
            $table->string('cook_time')->nullable(); // Thời gian nấu 
            $table->string('short_description')->nullable(); // Mô tả ngắn (1-2 câu)
            $table->string('description')->nullable(); // Mô tả chi tiết 
            $table->float('rating')->default(0); // Điểm rating trung bình 
            $table->integer('rating_count')->default(0); // Tổng số lượt đánh giá
            $table->integer('views')->default(0); // Số lượt xem
            $table->boolean('is_featured')->default(false); // Đánh dấu món nổi bật 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
