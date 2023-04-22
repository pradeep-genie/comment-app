<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->unsignedBigInteger('movie_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_mode');
            $table->date('payment_date');
            $table->string('reference_id');
            $table->string('transaction_id');
            $table->decimal('amount', 8, 2);
            $table->enum('status',['failed','successful']);
            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
