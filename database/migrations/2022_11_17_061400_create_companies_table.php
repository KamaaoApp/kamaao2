<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_legal_name');
            $table->string('company_popular_name');
            $table->string('company_url');
            $table->string('company_logo');
            $table->string('about_company', 1000);
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
        Schema::dropIfExists('companies');
    }
}
