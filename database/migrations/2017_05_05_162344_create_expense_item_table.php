<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenseItems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('expenses_id');
            $table->string('name');
            $table->decimal('amount',18,2);
            $table->foreign('expenses_id')->references('id')->on('expenses');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenseItems');
    }
}
