<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('address');
            $table->integer('phone')->unsigned();
            $table->string('description', 1000);
            $table->string('logo_img_link', 500);
            $table->string('website');
            $table->string('google_maps_url', 1000);
            $table->integer('shop_type_id')->unsigned();
            $table->foreign('shop_type_id')->references('id')->on('shop_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
