<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('sub_title');
            $table->string('job_type');
            $table->string('job_category');
            $table->integer('is_expired')->default(0)->comment("0 is NO, 1 YES");
            $table->date('last_date');
            $table->string('total_openings');
            $table->integer('opening_left')->nullable();
            $table->string('min_salary');
            $table->string('max_salary');
            $table->string('area');
            $table->string('city');
            $table->bigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->string('state');
            $table->bigInteger('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            
            $table->string('description_video'); 
            $table->text('roles_responsibility');
            
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->string('cta1')->nullable();
            $table->string('cta1_text')->nullable();
            $table->string('cta2')->nullable();
            $table->string('cta2_text')->nullable();

            $table->string('min_education');
            $table->integer('experience_required')->comment("in months, 1 year 2 month will be 14 months");
            $table->string('skills_required');
            
            $table->string('documents_required');
            $table->text('additional_requirement')->nullable();
            $table->integer('is_enabled')->default(1)->comment("0 is disabled, 1 is active");
            $table->integer('like_count')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
