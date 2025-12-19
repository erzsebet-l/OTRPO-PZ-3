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
            $table->string('name', 1000); // чей дом
            $table->string('image_url', 1000); // фото герба
            $table->string('text', 10000); // краткая информация
            $table->string('motto', 1000); // девиз
            $table->string('castle', 1000); // замок
            $table->longText('detail_text'); // подробная информация
            $table->timestamps(); // даты создания/изменения автоматически

             // Для soft deletes
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
