<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->unique();
            $table->foreign('user_id', 'user_personal_fk_1721060')->references('id')->on('users');
            $table->text('applicant_name');
            $table->text('father_or_husband_name');
            $table->string('date_of_birth');
            $table->text('gender');
            $table->text('married_status');
            $table->text('religion');
            $table->bigInteger('mobile_no');
            $table->string('pan_no');
            $table->bigInteger('adhar_no');
            $table->text('education_type');
            $table->longText('pre_address_line_one');
            $table->longText('pre_address_line_two')->nullable();
            $table->unsignedInteger('pre_country')->nullable();
            $table->foreign('pre_country', 'pre_country_fk_1721070')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedInteger('pre_state')->nullable();
            $table->foreign('pre_state', 'pre_state_fk_1721071')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedInteger('pre_city')->nullable();
            $table->foreign('pre_city', 'pre_city_fk_1721072')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('pre_zipcode');
            $table->longText('per_address_line_one');
            $table->longText('per_address_line_two')->nullable();
            $table->unsignedInteger('per_country')->nullable();
            $table->foreign('per_country', 'per_country_fk_1721073')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedInteger('per_state')->nullable();
            $table->foreign('per_state', 'per_state_fk_1721074')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedInteger('per_city')->nullable();
            $table->foreign('per_city', 'per_city_fk_1721075')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('per_zipcode');
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
        Schema::dropIfExists('users_personal_details');
    }
}
