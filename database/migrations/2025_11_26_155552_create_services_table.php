<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('images', 255);
            // TODO $table->foreign('category_id')->references('id')->on('categories');
            // "todo" after adding categories table
            $table->foreignId('category_id')->nullable();
            $table->string('slug');
            $table->decimal('price', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
