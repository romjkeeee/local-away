<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnGenderToPersonalStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_styles', function (Blueprint $table) {
            $table->bigInteger('gender')->change();
            $table->renameColumn('gender','gender_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_styles', function (Blueprint $table) {
            //
        });
    }
}
