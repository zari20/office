<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeIntroduceBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_introduce_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('number')->nullable();
            $table->unsignedInteger('tab_number')->nullable();
            $table->string('title')->nullable();
            $table->text('passage')->nullable();
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
        Schema::dropIfExists('welcome_introduce_blogs');
    }
}
