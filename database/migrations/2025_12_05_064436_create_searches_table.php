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
        Schema::create('searches', function (Blueprint $table) {
    $table->id(); // ID log tìm kiếm

    $table->string('keyword'); // Từ khóa người dùng tìm
    $table->integer('result_count')->default(0); // Số kết quả trả về (nếu muốn lưu)
    $table->integer('count')->default(1); // Số lần cùng từ khóa này được tìm
    $table->timestamp('last_searched_at')->nullable(); // Lần tìm cuối

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('searches');
    }
};
