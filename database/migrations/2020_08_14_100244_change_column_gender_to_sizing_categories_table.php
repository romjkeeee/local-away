<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnGenderToSizingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sizing_categories', function (Blueprint $table) {
            $table->removeColumn('gender');
            $table->bigInteger('gender_id')->unsigned()->nullable();

            $table->foreign('gender_id')->references('id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sizing_categories', function (Blueprint $table) {
            //
        });
    }
}
