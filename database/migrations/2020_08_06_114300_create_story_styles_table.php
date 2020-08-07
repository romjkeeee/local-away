<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_styles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('travel_stories_id')->unsigned();
            $table->string('image');
            $table->bigInteger('gender_id')->unsigned();
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
        Schema::dropIfExists('story_styles');
    }
}
