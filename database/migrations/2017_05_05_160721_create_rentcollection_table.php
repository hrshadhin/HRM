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
            $table->enum('collectionType',['Cash','Cheque','PO']);
            $table->string('checkNo')->nullable();
            $table->string('bankName')->nullable();
            $table->string('bankBranch')->nullable();
            $table->string('poNo')->nullable();
            $table->string('poName')->nullable();
            $table->string('poCode')->nullable();
            $table->text('note')->nullable();
            $table->date('collectionDate');
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
