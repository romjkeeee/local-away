<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizingCategorySizingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizing_category_sizings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sizing_categories_id')->unsigned();
            $table->bigInteger('sizing_id')->unsigned();
            $table->timestamps();

            $table->foreign('sizing_categories_id')->references('id')->on('sizing_categories')
                ->onDelete('cascade');
            $table->foreign('sizing_id')->references('id')->on('sizings')
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
        Schema::dropIfExists('sizing_category_sizings');
    }
}
