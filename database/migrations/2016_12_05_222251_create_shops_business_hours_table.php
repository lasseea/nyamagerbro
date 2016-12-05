<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsBusinessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_business_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->timestamps();
            $table->integer('day_of_week');
            $table->time('start_hour');
            $table->integer('end_hour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops_business_hours');
    }
}
