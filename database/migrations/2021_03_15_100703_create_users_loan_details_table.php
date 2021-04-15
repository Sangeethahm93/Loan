<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_loan_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_1721200')->references('id')->on('users')->onDelete('cascade');
            $table->string('existing_loan_bank');
            $table->string('existing_loan_type');
            $table->decimal('existing_loan_amount');
            $table->decimal('existing_loan_emi');
            $table->string('existing_loan_tenure');
            $table->string('existing_loan_start_date');
            $table->string('existing_loan_account_number');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_loan_details');
    }
}
