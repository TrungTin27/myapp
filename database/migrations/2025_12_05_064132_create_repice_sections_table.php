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
        Schema::create('recipe_sections', function (Blueprint $table) {
    $table->id(); // ID section

    $table->foreignId('product_id') // Thuộc sản phẩm / công thức nào
          ->constrained('products')->onDelete('cascade');

    $table->string('title'); // Tiêu đề section (ví dụ: "Nguyên liệu", "Hướng dẫn")
    $table->longText('content')->nullable(); // Nội dung section (có thể HTML)
    $table->integer('sort_order')->default(0); // Thứ tự hiển thị trong mục lục

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repice_sections');
    }
};
