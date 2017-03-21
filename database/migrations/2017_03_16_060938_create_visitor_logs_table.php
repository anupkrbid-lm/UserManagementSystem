<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cookie_id'); // cookie
            $table->ipAddress('ip_address'); // $details->query
            $table->string('region'); // $details->regionName
            $table->string('region_code'); // $details->region
            $table->string('city'); // $details->city
            $table->string('country'); // $details->counry
            $table->string('country_code'); //$details->countryCode
            $table->string('timezone'); // $details->timezone
            $table->string('isp'); // $details->isp
            $table->float('latitide', 8, 4);  // $details->lat
            $table->float('longitude', 8, 4); // $details->lon
            $table->string('ua_type');
            $table->string('ua_os');
            $table->string('ua_browser');
            $table->string('date');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('visited_at')->nullable();
            $table->timestamp('left_at')->nullable();
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
        Schema::dropIfExists('visitor_logs');
    }
}
