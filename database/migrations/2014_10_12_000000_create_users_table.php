<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('enc_pass');
            $table->string('user_type')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('phone')->nullable();
            $table->integer('team_leader')->nullable();
            $table->integer('is_enabled')->default(0)->comment("0 is disabled user, 1 is active");            
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });


        
    $dummy_data = [
            
        [
            "name"=> "aman",
            "email"=>'aman@gmail.com',
            "password"=>Hash::make(123456789),
            "enc_pass"=>123456789,
            "created_at"=>now(),
            "updated_at"=>now()
        ],
        [
            "name"=> "neha",
            "email"=>"neha@gmail.com",
            "password"=>Hash::make(123456789),
            "enc_pass"=>123456789,
            "created_at"=>now(),
            "updated_at"=>now()
        ],
    ];
    DB::table('users')->insert($dummy_data);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
