<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('order_quiz_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('size_id')->unsigned();
            $table->bigInteger('color_id')->unsigned();
            $table->integer('count');
            $table->bigInteger('status_id')->unsigned();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');
            $table->foreign('order_quiz_id')->references('id')->on('order_quiz_settings')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizings')
                ->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')
                ->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')
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
        Schema::dropIfExists('order_products');
    }
}
