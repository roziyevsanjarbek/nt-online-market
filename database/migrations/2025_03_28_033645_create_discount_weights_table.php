<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('discount_weights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('unit', 10)->default('kg');
            $table->date('discount_start')->nullable();
            $table->date('discount_end')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discount_weights');
    }
};
