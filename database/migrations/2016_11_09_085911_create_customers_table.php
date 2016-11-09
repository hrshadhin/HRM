<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',20);
            $table->string('code',20);
            $table->string('name',100);
            $table->string('cellNo',15);
            $table->string('phoneNo',15);
            $table->string('email',100);
            $table->date('dob');
            $table->string('contactPerson',100);
            $table->string('contactPersonCellNo',15);
            $table->string('referenceName',100);
            $table->string('referenceContactNo',15);
            $table->string('mailingAddress');
            $table->string('profession');
            $table->enum('active',['Yes','No']);
            $table->string('salesPerson',100);
            $table->string('groupName',100);
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
