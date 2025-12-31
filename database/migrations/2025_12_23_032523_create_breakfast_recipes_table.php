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
        Schema::create('breakfast_recipes', function (Blueprint $table) {
            $table->id();

            // Thông tin chính
            $table->string('title');
            $table->string('slug')->unique();

            // Media
            $table->string('thumbnail')->nullable();

            // Giá
            $table->decimal('recipe_price', 8, 2)->nullable();
            $table->decimal('serving_price', 8, 2)->nullable();

            // Trạng thái
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breakfast_recipes');
    }
};
