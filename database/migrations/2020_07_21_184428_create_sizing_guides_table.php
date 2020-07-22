<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizingGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizing_guides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sizing_category_id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('image');
            $table->enum('gender',['male', 'female']);
            $table->boolean('active')->default(false);
            $table->timestamps();

            $table->foreign('sizing_category_id')->references('id')->on('sizing_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizing_guides');
    }
}
