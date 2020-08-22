<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsToOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned()->nullable()->change();
            $table->bigInteger('order_quiz_id')->unsigned()->nullable()->change();
            $table->bigInteger('product_id')->unsigned()->nullable()->change();
            $table->bigInteger('size_id')->unsigned()->nullable()->change();
            $table->bigInteger('color_id')->unsigned()->nullable()->change();
            $table->integer('count')->nullable()->change();
            $table->bigInteger('status_id')->unsigned()->nullable()->change();
            $table->integer('price')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            //
        });
    }
}
