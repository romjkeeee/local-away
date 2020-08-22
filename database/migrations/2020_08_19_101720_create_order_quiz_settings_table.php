<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderQuizSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_quiz_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('package_type_id')->unsigned();
            $table->string('personal_style_ids');
            $table->string('styled_id');
            $table->bigInteger('body_type_id')->unsigned();
            $table->json('preferences');
            $table->json('sizing_info');
            $table->json('costs');
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');
            $table->foreign('package_type_id')->references('id')->on('package_types')
                ->onDelete('cascade');
            $table->foreign('body_type_id')->references('id')->on('body_types')
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
        Schema::dropIfExists('order_quiz_settings');
    }
}
