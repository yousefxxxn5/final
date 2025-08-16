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
        Schema::create('butteries', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('charge')->nullable()->default('0');
            $table->string('velue')->nullable()->default('0');
            $table->string('change')->nullable()->default('0');
            $table->string('state')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('butteries');
    }
};
