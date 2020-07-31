<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('qa_id')->unsigned();
            $table->string('email');
            $table->timestamps();

            $table->foreign('qa_id')->references('id')->on('qas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qa_forms');
    }
}
