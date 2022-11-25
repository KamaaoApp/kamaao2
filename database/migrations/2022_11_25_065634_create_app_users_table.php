<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('alternet_phone')->nullable();
            $table->integer('otp')->nullable();
            $table->integer('otp_verified')->default(0)->comment('0 not verified, 1 verified');
            $table->string('languages')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('area')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('bank_document')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ac_holder_name')->nullable();
            $table->string('bank_ac_number')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('upi_id')->nullable();
            $table->integer('upi_verified')->default(0)->comment("0 no, 1 Yes");
            $table->integer('is_enabled')->default(0)->comment("0 is disabled user, 1 is active");
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
        Schema::dropIfExists('app_users');
    }
}
