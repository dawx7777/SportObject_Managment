<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('adress');
            $table->string('city');
            $table->string('state');
            $table->string('hours');
            $table->string('picture');
            $table->decimal('latitude',8,6);
            $table->decimal('longitude',9,6);
            $table->string('width');
            $table->string('lenght');
            $table->enum('type',array('sztuczna','połsztuczna','trawiasta','tartan'));
            $table->enum('light', array('halgoen','LED','brak'));
            $table->enum('count', array('mniej', 'wiecej','7 vs 7', '6 vs 6', '5 vs 5'));
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
        Schema::dropIfExists('objects');
    }
}
