<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_Id');
            $table->string('traking_mo');
            $table->string('fullName');
            $table->string('email');
            $table->string('phone');
            $table->string('codepostal');
            $table->mediumText('address');
            $table->string('Status_message');
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
