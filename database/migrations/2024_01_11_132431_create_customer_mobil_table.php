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
        Schema::create('customer_mobil', function (Blueprint $table) {
            $table->id('kode');
            $table->unsignedBigInteger('id_mobil');
            $table->unsignedBigInteger('id_customer');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id_mobil')->on('mobil')->onDelete('cascade');
            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_mobil');
    }
};
