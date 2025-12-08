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
        Schema::create('posts', function (Blueprint $table) {
    $table->id(); // ID bài viết

    $table->string('title'); // Tiêu đề bài viết
    $table->string('slug')->nullable()->unique(); // Slug cho URL
    $table->string('thumbnail')->nullable(); // Ảnh đại diện
    $table->longText('content')->nullable(); // Nội dung bài (HTML)
    $table->string('excerpt')->nullable(); // Trích đoạn ngắn
    $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
    // Nếu có bảng users, liên kết author (nullable nếu không dùng user table)

    $table->boolean('is_published')->default(true); // Công khai hay draft
    $table->timestamp('published_at')->nullable(); // Thời gian xuất bản

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
