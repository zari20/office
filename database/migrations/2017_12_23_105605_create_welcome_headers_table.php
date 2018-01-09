<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telephone')->nullable();
            $table->string('link_name')->nullable();
            $table->string('link_href')->nullable();
            $table->string('link_icon')->nullable();
            $table->string('search_placeholder')->nullable();
            $table->string('top_links_topic')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('website_title')->nullable();
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
        Schema::dropIfExists('welcome_headers');
    }
}
