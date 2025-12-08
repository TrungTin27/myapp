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
        Schema::create('reviews', function (Blueprint $table) {
    $table->id(); // ID review

    $table->foreignId('product_id') // Thuộc sản phẩm nào
          ->constrained('products')->onDelete('cascade');

    $table->foreignId('user_id')->nullable(); // Nếu có hệ thống user, lưu user_id 
    $table->tinyInteger('rating')->default(5); // Số sao: 1-5 
    $table->text('comment')->nullable(); // Nội dung đánh giá
    $table->string('author_name')->nullable(); // Tên người đánh giá 

    $table->boolean('is_approved')->default(false); // Admin duyệt hay không
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
