<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouncilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('councils', function (Blueprint $table) {
            $table->increments('id');
            $table->text('place');
            $table->datetime('time');
            $table->text('user1');
            $table->integer('phone1');
            $table->text('user2');
            $table->integer('phone2');
            $table->text('user3');
            $table->integer('phone3');
            $table->text('user4');
            $table->integer('phone4');
            $table->text('user5');
            $table->integer('phone5');
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
        Schema::dropIfExists('councils');
    }
}
