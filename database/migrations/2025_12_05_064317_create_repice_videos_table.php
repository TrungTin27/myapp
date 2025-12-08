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
        Schema::create('recipe_videos', function (Blueprint $table) {
    $table->id(); // ID video

    $table->foreignId('product_id') // Thuộc công thức nào
          ->constrained('products')->onDelete('cascade');

    $table->string('title')->nullable(); // Tiêu đề video
    $table->string('video_url'); // URL/ID YouTube hoặc đường dẫn file mp4
    $table->string('thumbnail')->nullable(); // Hình thumbnail cho video
    $table->string('duration')->nullable(); // Độ dài (ví dụ: "05:34")

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repice_videos');
    }
};
