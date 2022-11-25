<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('has_reviewed')->nullable()->default(0)->comment("0 is no, 1 is yes");
            $table->integer('is_open')->default(1)->comment("0 is Clesed, 1 is open");
            $table->string('description', 500)->nullable();
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('app_users');
            $table->bigInteger('reviewed_by')->unsigned()->index()->nullable();
            $table->foreign('reviewed_by')->references('id')->on('users');
            $table->dateTime('closing_date')->nullable();
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
        Schema::dropIfExists('user_supports');
    }
}
