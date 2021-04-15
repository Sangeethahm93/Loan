<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOccupationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_occupation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->unique();
            $table->foreign('user_id', 'user_fk_1721080')->references('id')->on('users')->onDelete('cascade');
            $table->string('occupation');
            $table->string('salried_occupation_company_type')->nullable();
            $table->string('salried_occupation_industry_type')->nullable();
            $table->string('self_employeed_company_type')->nullable();
            $table->string('self_employeed_business')->nullable();
            $table->string('self_employeed_professional')->nullable();
            $table->string('other_occupation')->nullable();
            $table->string('designation')->nullable();
            $table->string('current_job_experience')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('company_name')->nullable();
            $table->longText('address_line_one')->nullable();
            $table->longText('address_line_two')->nullable();
            $table->unsignedInteger('country')->nullable();
            $table->foreign('country', 'country_fk_1721081')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedInteger('state')->nullable();
            $table->foreign('state', 'state_fk_1721082')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedInteger('city')->nullable();
            $table->foreign('city', 'city_fk_1721083')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('zipcode')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('company_email')->nullable();
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
        Schema::dropIfExists('users_occupation_details');
    }
}
