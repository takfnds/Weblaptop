<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_fee', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->default(0);
            $table->integer('district_id')->default(0);
            $table->integer('ward_id')->default(0);
            $table->integer('money')->default(0);
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
        Schema::dropIfExists('shipping_fee');
    }
}
