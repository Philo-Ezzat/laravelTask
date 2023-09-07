<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                 
            $table->string('name');
            $table->float('price')->default(0);
            $table->string('availability');
            $table->foreignId('category_id'); 
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */

     // rollbck
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};