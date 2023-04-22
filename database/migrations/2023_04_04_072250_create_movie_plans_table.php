<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->decimal('price', 8, 2);
            $table->string('discount')->nullable();
            $table->text('description')->nullable();
            $table->string('validity');
            $table->integer('movies_qty');
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
        Schema::dropIfExists('movie_plans');
    }
}
