<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('t_user_id')->default(0)->index();
            $table->integer('t_total_money')->default(0);
            $table->string('t_name')->nullable();
            $table->string('t_email')->nullable();
            $table->string('t_phone')->nullable();
            $table->string('t_address')->nullable();
            $table->string('t_note')->nullable();
            $table->string('t_type')->default(1)->nullable();
            $table->tinyInteger('t_status')->default(1);
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
        Schema::dropIfExists('transactions');
    }
}
