<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('loan_amount', 15, 2);
            $table->longText('loan_purpose');
            $table->longText('loan_tenure');
            $table->longText('description');
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_1721052')->references('id')->on('statuses');
            $table->unsignedInteger('analyst1_id')->nullable();
            $table->foreign('analyst1_id', 'analyst1_fk_1721053')->references('id')->on('users');
            $table->unsignedInteger('analyst2_id')->nullable();
            $table->foreign('analyst2_id', 'analyst2_fk_1721054')->references('id')->on('users');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_1721055')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 1000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_applications');
    }
}
