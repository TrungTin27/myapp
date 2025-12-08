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
        Schema::create('contact_messages', function (Blueprint $table) {
    $table->id(); // ID message

    $table->string('name'); // Tên người gửi
    $table->string('email'); // Email người gửi
    $table->string('subject')->nullable(); // Tiêu đề
    $table->text('message'); // Nội dung tin nhắn

    $table->boolean('is_read')->default(false); // Đánh dấu đã đọc
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
