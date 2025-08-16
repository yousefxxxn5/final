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
        Schema::create('telegrams', function (Blueprint $table) {
            $table->id();

            $table->string("name")->nullable()->default('no user');
            $table->string("id_user")->nullable()->default('000000');
            $table->string("role")->nullable()->default('user');
            $table->boolean("state")->nullable()->default(false);

            $table->unsignedBigInteger('exid')->nullable();; // مفتاح خارجي يشير إلى users.id
            $table->unsignedBigInteger('foruser')->nullable(); // مفتاح خارجي يشير إلى users.id
            $table->string("number_test")->nullable()->default('0000');

            // إنشاء العلاقة مع جدول users
            $table->foreign('exid')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegrams');
    }
};
