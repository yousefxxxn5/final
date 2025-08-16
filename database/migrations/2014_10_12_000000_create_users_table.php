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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('is_twoilo')->nullable()->default(0);
            // $table->string('twoilo_code')->nullable()->default(0);
            $table->string('is_valid')->nullable()->default(0);
            $table->string('email')->nullable()->default(0);
           $table->date("activeDate")->nullable();

           $table->date("updateDate")->nullable();
            // $table->string('whatsAppNumber')->nullable()->default(0);
            // $table->string('whatsAppToken')->nullable()->default(0);
            // $table->string('whatsAppTo')->nullable()->default(0);
            // $table->string('whatsAppFrom')->nullable()->default(0);
            // $table->string('whatsAppMassege')->nullable()->default(0);
            // $table->string('EmailNumber')->nullable()->default(0);
            // $table->string('EmailToken')->nullable()->default(0);
            // $table->string( 'EmailTo')->nullable()->default(0);
            // $table->string('EmailFrom')->nullable()->default(0);
            // $table->string('EmailMassege')->nullable()->default(0);
            $table->string('Serial_number')->nullable()->default(0);
            $table->string('first_star')->nullable()->default(0);
            $table->string('phone_number')->nullable()->default(0);
            $table->string('state_user_serial')->nullable()->default(0);
            $table->string('state')->nullable()->default(0);
            $table->string('state_user')->nullable()->default(0);
            $table->string('Username')->nullable()->default(0);
            // $table->string('smsNumber')->nullable()->default(0);
            // $table->string('smsToken')->nullable()->default(0);
            // $table->string( 'smsTo')->nullable()->default(0);
            $table->string( 'many')->nullable()->default(10);
            // $table->string('smsFrom')->nullable()->default(0);
            // $table->string('smsMassege')->nullable()->default(0);
            $table->string('channel')->nullable()->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
