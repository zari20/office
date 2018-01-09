<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('number')->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('aparat_link')->nullable();
            $table->string('picture_path')->nullable();
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
        Schema::dropIfExists('welcome_videos');
    }
}
