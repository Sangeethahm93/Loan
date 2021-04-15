<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('bank_income_details')->default(0);
            $table->boolean('personal_details')->default(0);
            $table->boolean('kyc_documents')->default(0);
            $table->boolean('occupation')->default(0);
            $table->boolean('loan_details')->default(0);
            $table->boolean('additional_details')->default(0);
            $table->boolean('salary_documents')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
