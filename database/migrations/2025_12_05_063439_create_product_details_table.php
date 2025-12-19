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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id(); // ID bản ghi chi tiết

            $table->foreignId('product_id') // Khóa ngoại liên kết tới products.id
                ->constrained('products')->onDelete('cascade');

            $table->longText('content')->nullable(); // Nội dung chi tiết 
            $table->longText('nutrition')->nullable(); // Thông tin dinh dưỡng (nếu có)
            $table->longText('tips')->nullable(); // Ghi chú và mẹo 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
