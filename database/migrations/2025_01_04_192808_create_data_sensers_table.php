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
        Schema::create('data_sensers', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('sw1')->nullable()->default('sw 1');
            $table->string('sw2')->nullable()->default('sw 2');
            $table->string('sw3')->nullable()->default('sw 3');
            $table->string('sw4')->nullable()->default('sw 4');
            $table->string('sw5')->nullable()->default('sw 5');
            $table->string('ir1')->nullable()->default('ir 1');
            $table->string('ir2')->nullable()->default('ir 2');
            $table->string('ir3')->nullable()->default('ir 3');
            $table->string('ir4')->nullable()->default('ir 4');
            $table->string('fire1')->nullable()->default('fire1');
            $table->string('fire2')->nullable()->default('fire2');
            $table->string('fire3')->nullable()->default('fire3');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sensers');
    }
};
