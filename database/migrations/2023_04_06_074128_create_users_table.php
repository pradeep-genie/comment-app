<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('address');
            $table->string('language')->nullable();;
            $table->float('latitude')->nullable();;
            $table->float('lognitute')->nullable();;
            $table->string('profile_image')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('status',['Active','InActive'])->default('Active');
            $table->string('device_name')->nullable();;
            $table->string('device_imei')->nullable();;
            $table->date('installed_date')->nullable();;
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
        Schema::dropIfExists('users');
    }
}
