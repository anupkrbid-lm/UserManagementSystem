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
        Schema::create('portfolio_cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('project_title');
            $table->text('description');
            $table->text('project_details');
            $table->string('client');
            $table->string('tags');
            $table->string('project_link');
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
