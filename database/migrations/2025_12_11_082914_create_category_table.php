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
        Schema::create('category', function (Blueprint $table) {
            $table->id(); // ID danh mục

            $table->string('name'); // Tên danh mục (ví dụ: "Chicken", "Pasta")
            $table->string('slug')->nullable()->unique(); // Slug danh mục
            $table->string('icon')->nullable(); // Icon / hình đại diện
            $table->text('description')->nullable(); // Mô tả danh mục

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
