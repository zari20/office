<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('section_id')->default(0);
            $table->unsignedSmallInteger('number')->nullable();
            $table->string('title')->nullable();
            $table->string('passage')->nullable();
            $table->string('icon')->nullable();
            $table->string('word')->nullable();
            $table->string('link')->nullable();
            $table->string('picture_sticker')->nullable();
            $table->string('text_sticker')->nullable();
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
        Schema::dropIfExists('welcome_cards');
    }
}
