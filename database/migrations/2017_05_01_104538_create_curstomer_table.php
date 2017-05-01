<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurstomerTable extends Migration
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
            $table->string('name');
            $table->string('cellNo',15)->unique();
            $table->string('phoneNo',15)->nullable();
            $table->string('email',100)->nullable();
            $table->date('dob')->nullable();
            $table->string('contactPerson',100)->nullable();
            $table->string('contactPersonCellNo',15)->nullable();
            $table->string('fatherName',100)->nullable();
            $table->string('motherName',100)->nullable();
            $table->string('spouseName',100)->nullable();
            $table->string('nidNo')->nullable();
            $table->string('passportNo')->nullable();
            $table->string('mailingAddress',500)->nullable();
            $table->string('presentAddress',500)->nullable();
            $table->string('permanentAddress',500);
            $table->string('birthCertificate')->nullable();
            $table->string('passport')->nullable();
            $table->string('photo')->nullable();
            //business info
            $table->string('companyName')->nullable();
            $table->string('designation',100)->nullable();
            $table->string('cContactPerson',100)->nullable();
            $table->string('cContactPersonCellNo',15)->nullable();
            $table->string('cCellNo',15)->nullable();
            $table->string('cPhoneNo',15)->nullable();
            $table->string('cFaxNo',15)->nullable();
            $table->string('cEmail',100)->nullable();
            $table->string('cAddress',500)->nullable();
            $table->string('cNote',1000)->nullable();

            $table->enum('active',['Yes','No']);
            $table->date('entryDate');
            $table->unsignedInteger('users_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['users_id', 'entryDate']);
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
        Schema::dropIfExists('customers');
    }
}
