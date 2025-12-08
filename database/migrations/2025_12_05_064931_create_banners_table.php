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
        Schema::create('banners', function (Blueprint $table) {
    $table->id(); // ID banner

    $table->string('image'); // Ảnh banner (bắt buộc)
    $table->string('title')->nullable(); // Tiêu đề nhỏ hiển thị trên banner
    $table->string('subtitle')->nullable(); // Dòng phụ
    $table->string('link')->nullable(); // Link khi click vào banner
    $table->integer('sort_order')->default(0); // Thứ tự hiển thị
    $table->boolean('is_active')->default(true); // Banner có đang active hay không

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
