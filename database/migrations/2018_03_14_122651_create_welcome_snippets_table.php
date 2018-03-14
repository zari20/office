<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_snippets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section_id');
            $table->string('header')->nullable();
            $table->string('link')->nullable();
            $table->string('button')->nullable();
            $table->string('icon')->nullable();
            $table->string('picture_path')->nullable();
            $table->text('body');
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
        Schema::dropIfExists('welcome_snippets');
    }
}
