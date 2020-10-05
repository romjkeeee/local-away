<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeasurementColumnToSizingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sizings', function (Blueprint $table) {
            $table->bigInteger('measurement_id')->default(1)->unsigned();
            $table->foreign('measurement_id')->references('id')->on('measurements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sizings', function (Blueprint $table) {
            //
        });
    }
}
