<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeightMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('height_metrics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('height_id')->default(1)->unsigned();
            $table->foreign('height_id')->references('id')->on('heights');
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('height_metrics');
    }
}
