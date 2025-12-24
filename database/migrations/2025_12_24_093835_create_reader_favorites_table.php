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
        Schema::create('reader_favorites', function (Blueprint $table) {
            $table->id(); // ID

            $table->string('title');
            // Tiêu đề món / bài viết

            $table->string('slug')->unique();
            // Dùng cho URL GET RECIPE

            $table->string('thumbnail')->nullable();
            // Ảnh hiển thị

            $table->float('rating')->default(0);
            // Số sao (0 → 5)

            $table->text('excerpt')->nullable();
            // Mô tả ngắn

            $table->boolean('is_active')->default(true);
            // Bật / tắt hiển thị ngoài home

            $table->integer('sort_order')->default(0);
            // Sắp xếp hiển thị

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reader_favorites');
    }
};
