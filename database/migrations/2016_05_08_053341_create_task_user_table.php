<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('task_user', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             $table->integer('task_id')->unsigned();
             $table->integer('user_id')->unsigned();

             $table->foreign('task_id')->references('id')->on('tasks');
             $table->foreign('user_id')->references('id')->on('users');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::drop('task_user');
     }
}
