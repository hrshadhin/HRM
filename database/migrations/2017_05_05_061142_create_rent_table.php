<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projects_id');
            $table->unsignedInteger('customers_id');
            $table->unsignedInteger('flats_id');
            $table->string('rentNo',50);
            $table->decimal('perSftRent',18,2);
            $table->decimal('rent',18,2);
            $table->decimal('serviceCharge',18,2);
            $table->decimal('securityMoney',18,2);
            $table->decimal('advanceMoney',18,2);
            $table->decimal('monthlyDeduction',18,2);
            $table->decimal('monthlyDeductionTax',18,2);
            $table->decimal('utilityCharge',18,2);
            $table->decimal('delayCharge',18,2);
            $table->text('note')->nullable();
            $table->string('deepPaper')->nullable();
            $table->string('othersPaper')->nullable();
            $table->tinyInteger('status')->default('1'); // 1 for active 0 for inactive
            $table->date('entryDate');
            $table->date('deedStart');
            $table->date('deedEnd');
            $table->unsignedInteger('users_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->foreign('flats_id')->references('id')->on('flats');
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
        Schema::dropIfExists('rents');
    }
}
