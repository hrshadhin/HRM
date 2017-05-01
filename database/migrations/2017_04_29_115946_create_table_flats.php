<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFlats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projects_id');
            $table->date('entryDate');
            $table->unsignedInteger('users_id');
            $table->integer('floor');
            $table->integer('type');
            $table->enum('parking',['Yes','No']);
            $table->string('parkingNo',255)->nullable();
            $table->bigInteger('size');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default('0'); // 0 for empty 1 for booked
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->foreign('users_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
