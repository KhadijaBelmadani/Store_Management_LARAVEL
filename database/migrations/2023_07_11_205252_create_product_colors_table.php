<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('product_colors')) {
            Schema::create('product_colors', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('Id_Produit');
                $table->unsignedBigInteger('Id_Color')->nullable;
                $table->integer('Quantité');
                $table->timestamps();


                $table->foreign('Id_Produit')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('Id_Color')->references('id')->on('colors')->onDelete('set null');

            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colors');
    }
};
