<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->text('messages');
            $table->string('carrier')->nullable();
            $table->string('tracking_number');
            $table->text('address_from');
            $table->text('address_to');
            $table->string('eta');
            $table->string('original_eta');
            $table->text('servicelevel');
            $table->string('metadata')->nullable();
            $table->text('tracking_status');
            $table->text('tracking_history');
            $table->string('transaction')->nullable();
            $table->boolean('test');
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
        Schema::dropIfExists('shippings');
    }
}
