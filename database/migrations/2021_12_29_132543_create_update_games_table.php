<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('games_id')->unsigned()->index();
            $table->foreign('games_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedInteger('minute');
            $table->string('type');
            $table->string('description');
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
        Schema::dropIfExists('update_games');
    }
}
