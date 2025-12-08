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
    $table->id(); // ID tự tăng, khóa chính

    $table->string('name'); // Tên sản phẩm / tên món ăn (bắt buộc)
    $table->string('slug')->nullable()->unique(); // Slug thân thiện cho URL (ví dụ: ga-rang-bo-toi)
    $table->string('image')->nullable(); // Ảnh đại diện (lưu path hoặc filename)
    $table->integer('price')->default(0); // Giá sản phẩm (sử dụng integer cho VND, mặc định 0)
    $table->string('currency')->default('VND'); // Đơn vị tiền tệ (mặc định VND)
    $table->string('servings')->nullable(); // Khẩu phần (ví dụ: 2 people)
    $table->string('cook_time')->nullable(); // Thời gian nấu (ví dụ: 30 mins)
    $table->string('difficulty')->nullable(); // Mức độ: Easy/Medium/Hard
    $table->string('category_slug')->nullable(); // (tùy) lưu slug category nhanh, không bắt buộc

    $table->string('short_description')->nullable(); // Mô tả ngắn (1-2 câu)
    $table->longText('description')->nullable(); // Mô tả chi tiết / HTML content

    $table->float('rating')->default(0); // Điểm rating trung bình (vd: 4.5)
    $table->integer('rating_count')->default(0); // Tổng số lượt đánh giá
    $table->integer('views')->default(0); // Số lượt xem

    $table->boolean('is_featured')->default(false); // Đánh dấu món nổi bật / chosen
    $table->boolean('is_published')->default(true); // Có hiển thị công khai hay không

    $table->timestamps(); // created_at, updated_at
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
