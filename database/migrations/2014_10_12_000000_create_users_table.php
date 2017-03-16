<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_code')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->text('avatar')->nullable();
            $table->string('class')->nullable();
            $table->string('course')->nullable();
            $table->string('workplace')->nullable();
            $table->integer('position')->nullable();
            $table->double('score')->nullable();
            $table->integer('council_id')->nullable();
            $table->integer('role')->default(0);
            $table->rememberToken();
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
