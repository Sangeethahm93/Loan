<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersIncomeBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_income_bank_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->unique();
            $table->foreign('user_id', 'user_fk_1721090')->references('id')->on('users')->onDelete('cascade');
            $table->string('monthly_salary')->nullable();
            $table->string('annual_turnover')->nullable();
            $table->string('net_profit')->nullable();
            $table->string('other_income')->nullable();
            $table->string('other_income_source_rental')->nullable();
            $table->string('other_income_source_agricultural')->nullable();
            $table->string('other_income_source_other')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('account_type')->nullable();
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
        Schema::dropIfExists('users_income_bank_details');
    }
}
