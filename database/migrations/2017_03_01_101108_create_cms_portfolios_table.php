<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Portfolio_CMS', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_title');
            $table->string('description');
            $table->string('project_details');
            $table->string('tags');
            $table->string('project_link');
            $table->string('client');
            $table->string('image');
            $table->string('img_path');
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
        Schema::dropIfExists('Portfolio_CMS');
    }
}
