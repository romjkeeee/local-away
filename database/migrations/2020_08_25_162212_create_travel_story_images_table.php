<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelStoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_story_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('travel_stories_id')->unsigned();
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders')
                ->onDelete('cascade');
            $table->foreign('travel_stories_id')->references('id')->on('travel_stories')
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
        Schema::dropIfExists('travel_story_images');
    }
}
