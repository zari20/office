<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWelcomeSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_sliders', function (Blueprint $table) {
            $table->dropColumn(['background_path','body']);
            $table->unsignedSmallInteger('number')->after('id')->nullable();
            $table->string('picture_path')->after('button_link')->nullable();
            $table->string('passage')->after('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_sliders', function (Blueprint $table) {
            $table->dropColumn(['number','picture_path','passage']);
            $table->string('background_path')->after('button_link')->nullable();
            $table->string('body')->after('title')->nullable();
        });
    }
}
