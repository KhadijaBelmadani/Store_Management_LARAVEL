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
    if(!Schema::hasTable('sliders')) {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('Titre');
            $table->mediumText('Description');
            $table->string('Image');
            $table->tinyInteger('Status')->default('0')->comment('1=invisible,0=visible');
            $table->timestamps();
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
        Schema::dropIfExists('sliders');
    }
};
