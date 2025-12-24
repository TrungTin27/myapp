<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tạo bảng posts
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            // ID tự tăng (khóa chính)
            $table->id();

            // Tiêu đề bài viết (hiển thị ngoài FE & admin)
            $table->string('title');

            // Slug dùng cho URL: /post/slug-bai-viet
            $table->string('slug')->unique();

            // Ảnh đại diện (Trending Now chỉ cần cái này)
            $table->string('thumbnail')->nullable();

            // Nội dung bài viết (chi tiết, có thể dùng cho trang post riêng)
            $table->longText('content')->nullable();

            // Mô tả ngắn (dùng cho list bài, SEO)
            $table->string('excerpt')->nullable();

            // Đánh dấu bài này có nằm trong "Trending Now" hay không
            $table->boolean('is_trending')->default(false);

            // Trạng thái bài viết: hiển thị hay ẩn
            $table->enum('status', ['draft', 'published'])->default('published');

            // Ngày xuất bản (để sắp xếp bài mới)
            $table->timestamp('published_at')->nullable();

            // created_at & updated_at
            $table->timestamps();
        });
    }

    /**
     * Xóa bảng posts
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
