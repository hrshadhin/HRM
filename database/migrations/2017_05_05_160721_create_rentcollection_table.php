<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentcollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customers_id');
            $table->unsignedInteger('rents_id');
            $table->string('collectionNo',50);
            $table->decimal('amount',18,2);
//            $table->decimal('monthlyDeduction',18,2);
//            $table->decimal('monthlyDeductionTax',18,2);
            $table->smallInteger('isDeduction')->default('0');//1 for yes 0 no
            $table->enum('collectionType',['Cash','Cheque','P.O']);
            $table->string('chequeNo')->nullable();
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('poNo')->nullable();
            $table->string('poName')->nullable();
            $table->string('poCode')->nullable();
            $table->text('note')->nullable();
            $table->date('collectionDate');
            $table->tinyInteger('fromAdvance')->default('0');//0 for none 1 for money came from advance
            $table->unsignedInteger('users_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->foreign('rents_id')->references('id')->on('rents');
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
        Schema::dropIfExists('collections');
    }
}
