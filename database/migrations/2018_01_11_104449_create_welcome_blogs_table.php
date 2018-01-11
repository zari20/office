<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section_id')->default(0);
            $table->unsignedInteger('number')->nullable();
            $table->string('title')->nullable();
            $table->string('picture_path')->nullable();
            $table->text('passage')->nullable();
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
        Schema::dropIfExists('welcome_blogs');
    }
}
