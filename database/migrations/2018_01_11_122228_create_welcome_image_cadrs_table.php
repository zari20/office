<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeImageCadrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_image_cadrs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section_id')->default(0);
            $table->unsignedInteger('number')->nullable();
            $table->string('title')->nullable();
            $table->string('passage')->nullable();
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
        Schema::dropIfExists('welcome_image_cadrs');
    }
}
