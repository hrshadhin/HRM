<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projectId',255);
            $table->enum('projectType',['Commerical','Residential','Residential & Commerical']);
            $table->string('name',255);
            $table->date('entryDate');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('areas_id');
            $table->string('address',500);
            $table->text('description')->nullable();
            $table->text('storied');
            $table->integer('noOfUnits');
            $table->integer('noOfFloor');
            $table->integer('noOfCarParking');
            $table->unsignedInteger('unitSize');
            $table->enum('lift',['Yes','No']);
            $table->enum('generator',['Yes','No']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('areas_id')->references('id')->on('areas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
