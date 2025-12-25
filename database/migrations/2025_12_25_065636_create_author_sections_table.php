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
        Schema::create('author_sections', function (Blueprint $table) {
            $table->id();

            // Tiêu đề chính (ví dụ: hello!)
            $table->string('title');

            // Đoạn mô tả ngắn bên dưới tiêu đề
            $table->text('description')->nullable();

            // Ảnh tác giả / ảnh giới thiệu
            $table->string('image')->nullable();

            // Text của nút (ví dụ: Learn more)
            $table->string('button_text')->nullable();

            // Link của nút (ví dụ: /about)
            $table->string('button_link')->nullable();

            // Bật / tắt hiển thị ngoài frontend
            $table->boolean('is_active')->default(true);

            // Thứ tự hiển thị (nếu sau này có nhiều section)
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_sections');
    }
};
