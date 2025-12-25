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
        Schema::create('how_tos', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            // Tiêu đề ngắn: "cook chicken breast in a pan"

            $table->string('slug')->unique();
            // URL dẫn bài chi tiết

            $table->string('thumbnail')->nullable();
            // Ảnh tròn hiển thị

            $table->boolean('is_active')->default(true);
            // Hiển thị / ẩn ngoài home

            $table->integer('sort_order')->default(0);
            // Sắp xếp vị trí

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_tos');
    }
};
