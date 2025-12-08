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
        Schema::create('recipe_steps', function (Blueprint $table) {
    $table->id(); // ID bước

    $table->foreignId('product_id') // Thuộc công thức / sản phẩm nào
          ->constrained('products')->onDelete('cascade');

    $table->integer('step_number')->default(1); // Thứ tự bước 123
    $table->text('instruction'); // Nội dung hướng dẫn của bước
    $table->string('image')->nullable(); // Ảnh minh họa cho từng bước 

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_steps');
    }
};
