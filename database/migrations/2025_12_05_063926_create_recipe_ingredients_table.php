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
        Schema::create('recipe_ingredients', function (Blueprint $table) {
    $table->id(); // ID nguyên liệu

    $table->foreignId('product_id') // Thuộc công thức nào
          ->constrained('products')->onDelete('cascade');

    $table->string('name'); // Tên nguyên liệu (ví dụ: "Olive oil")
    $table->string('amount')->nullable(); // Số lượng / định lượng (ví dụ: "2 tbsp", "200g")
    $table->integer('order')->default(0); // Thứ tự hiển thị (nếu cần sắp xếp)

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
