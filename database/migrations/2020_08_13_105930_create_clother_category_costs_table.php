<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClotherCategoryCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clother_category_costs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clothe_category_id')->unsigned();
            $table->bigInteger('cost_id')->unsigned();
            $table->timestamps();

            $table->foreign('clothe_category_id')->references('id')->on('clothe')
                ->onDelete('cascade');
            $table->foreign('cost_id')->references('id')->on('costs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clother_category_costs');
    }
}
