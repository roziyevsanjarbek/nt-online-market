<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name', 100)->unique();
            $table->text('description')->nullable();
            $table->foreignId('parent_category_id')->nullable()->constrained('Categories', 'category_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Categories');
    }
};
