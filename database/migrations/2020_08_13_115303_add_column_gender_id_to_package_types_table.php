<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGenderIdToPackageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_types', function (Blueprint $table) {
            $table->removeColumn('gender');
            $table->bigInteger('gender_id')->unsigned();

            $table->foreign('gender_id')->references('id')->on('genders')
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
        Schema::table('package_types', function (Blueprint $table) {
            //
        });
    }
}
