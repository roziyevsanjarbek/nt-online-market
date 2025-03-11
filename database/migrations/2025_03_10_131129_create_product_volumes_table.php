<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVolumesTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_volumes', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('volume_id')->constrained()->onDelete('cascade');
=======
            $table->string('name');
>>>>>>> b48e35d5c290b66e6b4121dfa191c7a3a66a15fb
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_volumes');
    }
}

