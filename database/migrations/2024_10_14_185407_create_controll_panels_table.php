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
        Schema::create('controll_panels', function (Blueprint $table) {
            $table->id();
            //  $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            //  $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            // $table->foreign('id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('button_state');
            // $table->foreignId('user_id')->references('id')->on('user')->cascadeOnDelete();

            $table->boolean('IR_senser');
            $table->boolean('SWITCH_senser');
            $table->boolean('CAMRA_senser');

            // $table->string('n1_sms');
            // $table->string('n2_sms');
            // $table->string('n3_sms');
            // $table->string('n1_whatapp');
            // $table->string('n2_whatapp');
            // $table->string('n3_whatapp');
            // $table->string('n1_email');
            // $table->string('n2_email');
            // $table->string('n3_email');

            $table->boolean('alart_sound');
            $table->string('connected')->nullable()->default(0);
            $table->string('sending')->nullable()->default('0');
            $table->boolean('saaaq_electrical');
            $table->boolean('send_sms');
            $table->boolean('send_whatapp');
            $table->boolean('send_telegram');
            $table->boolean('send_pumm');
            $table->boolean('send_eleictrical');
            $table->boolean('send_network');
            $table->boolean('test');
            $table->string('name');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controll_panels');
    }
};
