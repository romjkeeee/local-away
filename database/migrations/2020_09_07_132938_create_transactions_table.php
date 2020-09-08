<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token', 64)->unique();
            $table->string('processor', 32);
            $table->string('operation', 32);
            $table->integer('origin_cost');
            $table->integer('service_fee')->nullable()->default(0);
            $table->integer('cost');
            $table->char('currency', 3);
            $table->string('description')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('external_id', 128)->nullable();
            $table->json('response')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
