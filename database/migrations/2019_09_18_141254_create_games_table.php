<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // used to create table
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title'); // for shorter bodies of text
            $table->text('description'); // for longer bodies of text
            $table->text('img_name')->default('noCover.png'); // for longer bodies of text
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
