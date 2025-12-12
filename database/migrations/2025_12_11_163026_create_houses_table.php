<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name', 100000); // чей дом
            $table->string('image_url', 100000); // фото герба
            $table->string('text', 100000); // краткая информация
            $table->string('motto', 100000); // девиз
            $table->string('castle', 100000); // замок
            $table->string('detail_text', 100000); // подробная информация
            $table->timestamps(); // даты создания/изменения автоматически
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
