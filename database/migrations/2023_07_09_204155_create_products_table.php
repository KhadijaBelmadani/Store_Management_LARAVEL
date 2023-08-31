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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_Catégorie');
            $table->string('Nom');

            $table->string('Slug');
            $table->string('Marque')->nullable;
            $table->longText('Description')->nullable;
            $table->integer('Prix_Original');
            $table->integer('Prix_vente');
            $table->integer('Quantité');
            $table->tinyInteger('Tendance')->default('0')->comment('0->tendance,1->non_tendance');
            $table->tinyInteger('Status')->default('0')->comment('0->visible,1->invisible');
            $table->tinyInteger('Offre')->default('0')->comment('0->offre,1->non_offre');

            $table->foreign('Id_Catégorie')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
