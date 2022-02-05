<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teamgames', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('games_id')->unsigned()->index();
            $table->foreign('games_id')->references('id')->on('games')->onDelete('cascade');
            $table->bigInteger('firstteams_id')->unsigned()->index();
            $table->foreign('firstteams_id')->references('id')->on('teams')->onDelete('cascade');
            $table->bigInteger('secondteams_id')->unsigned()->index();
            $table->foreign('secondteams_id')->references('id')->on('teams')->onDelete('cascade');
            $table->string('first_team_score');
            $table->string('second_team_score');
            $table->boolean('status_gameteam')->default(false);
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
        Schema::dropIfExists('teamgames');
    }
}
