<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
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
            $table->string('title');
            $table->string('description');
            $table->string('url');
            $table->string('banner_image');
            $table->string('movie_path');
            $table->string('genre_id');
            $table->string('language_id');
            $table->boolean('premium')->default(false);
            $table->boolean('standard')->default(false);
            $table->boolean('kids')->default(false);
            $table->boolean('devotional')->default(false);
            $table->date('release_date');
            $table->float('imdb_rating')->nullable();
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
