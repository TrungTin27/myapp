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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // ID khoá học

            $table->string('title'); // Tên khoá học
            $table->string('slug')->nullable()->unique(); // Slug cho URL
            $table->string('short_description')->nullable(); // Mô tả ngắn
            $table->longText('description')->nullable(); // Mô tả chi tiết khoá học
            $table->string('image')->nullable(); // Ảnh đại diện khoá học
            $table->integer('price')->default(0); // Giá khoá học (0 = free)
            $table->string('level')->nullable(); // Trình độ: Beginner/Intermediate/Advanced
            $table->string('duration')->nullable(); // Thời lượng: "6 weeks", "10 hours"

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
