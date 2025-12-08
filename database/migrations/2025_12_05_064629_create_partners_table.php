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
        Schema::create('partners', function (Blueprint $table) {
    $table->id(); // ID partner

    $table->string('name'); // Tên công ty / đối tác
    $table->string('logo')->nullable(); // Logo image path
    $table->string('website')->nullable(); // Link website đối tác
    $table->text('description')->nullable(); // Mô tả ngắn về hợp tác

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
