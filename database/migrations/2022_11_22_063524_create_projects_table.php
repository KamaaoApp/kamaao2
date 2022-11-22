<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('title');
            $table->string('sub_title');
            $table->string('type');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_openings');
            $table->integer('opening_left');
            $table->string('amount');
            $table->string('area');
            $table->string('city');
            $table->bigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->string('state');
            $table->bigInteger('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('description_video');
            $table->text('term_conditions');
            $table->string('category')->nullable();
            $table->string('cta1')->nullable();
            $table->string('cta1_text')->nullable();
            $table->string('cta2')->nullable();
            $table->string('cta2_text')->nullable();
            $table->string('min_education');
            $table->integer('experience_required')->comment("in months, 1 year 2 month will be 14 months");
            $table->string('skills_required');
            $table->string('documents_required');
            $table->text('roles_responsibility');
            $table->text('additional_requirement')->nullable();
            $table->text('additional_reward')->nullable();
            $table->integer('like_count')->default(0);
            $table->integer('is_enabled')->default(1)->comment("0 is disabled user, 1 is active");
            $table->integer('number_of_applications')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
