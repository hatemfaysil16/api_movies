<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatemoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('e_id');
            $table->text('original_language');
            $table->text('original_title');
            $table->text('overview');
            $table->text('popularity');
            $table->text('poster_path');
            $table->text('release_date');
            $table->text('title');
            $table->text('video');
            $table->text('vote_average');
            $table->text('vote_count');
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
        Schema::dropIfExists('movies');
    }
}
