<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnMImagesTextTableManufacturers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->string('m_image')->nullable();
            $table->text('m_about')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->dropColumn(['m_image','m_about']);
        });
    }
}
