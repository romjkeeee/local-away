<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_destinations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('destination_story_id')->unsigned();
            $table->string('name');
            $table->string('image');
            $table->string('api_city');
            $table->string('url')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('destination_story_id')->references('id')->on('destination_stories')
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
        Schema::dropIfExists('sub_destinations');
    }
}
