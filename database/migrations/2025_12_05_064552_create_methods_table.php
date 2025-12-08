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
        Schema::create('methods', function (Blueprint $table) {
    $table->id(); // ID phương pháp

    $table->string('name'); // Tên phương pháp 
    $table->string('icon')->nullable(); // Icon hoặc hình minh hoạ
    $table->text('description')->nullable(); // Mô tả chi tiết về phương pháp

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methods');
    }
};
