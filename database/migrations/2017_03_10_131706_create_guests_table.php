<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('auth_hash');
            $table->ipAddress('ip_address');
            $table->string('city');
            $table->string('region');
            $table->string('region_code');
            $table->string('country');
            $table->string('country_code');
            $table->string('continent');
            $table->string('continent_code');
            $table->float('latitide', 9, 4);
            $table->float('longitude', 9, 4);
        //    $table->time('viewtime');
            $table->date('date');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('visited_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
