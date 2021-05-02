<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_stories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('destination_id')->unsigned();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->string('url')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')
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
        Schema::dropIfExists('destination_stories');
    }
}
