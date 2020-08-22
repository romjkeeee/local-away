<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('sum');
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('address_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('user_addresses')
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
        Schema::dropIfExists('orders');
    }
}
