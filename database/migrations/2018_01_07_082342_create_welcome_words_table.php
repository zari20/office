<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('co')->nullable();
            $table->string('other')->nullable();
            $table->string('product')->nullable();
            $table->string('search')->nullable();
            $table->string('online')->nullable();
            $table->string('introduce')->nullable();
            $table->string('about_us')->nullable();
            $table->string('our_team')->nullable();
            $table->string('our_services')->nullable();
            $table->string('our_projects')->nullable();
            $table->string('our_departments')->nullable();
            $table->string('our_views')->nullable();
            $table->string('our_branches')->nullable();
            $table->string('contact_us')->nullable();
            $table->string('contact_information')->nullable();
            $table->string('contact_main_branch')->nullable();
            $table->string('contact_branches')->nullable();
            $table->string('contact_us_form')->nullable();
            $table->string('present')->nullable();
            $table->string('catalogs')->nullable();
            $table->string('videos')->nullable();
            $table->string('latest_products')->nullable();
            $table->string('related_links')->nullable();
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
        Schema::dropIfExists('welcome_words');
    }
}
