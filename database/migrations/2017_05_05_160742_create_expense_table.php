<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projects_id');
            $table->string('expenseNo',50);
            $table->decimal('amount',18,2);
            $table->text('note')->nullable();
            $table->date('entryDate');
            $table->unsignedInteger('users_id');
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
        Schema::dropIfExists('expenses');
    }
}
