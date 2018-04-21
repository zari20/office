<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TitleTypeInWelcomeWebsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_websites', function (Blueprint $table) {
            $table->smallInteger('title_type')->after('telegram_chat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_websites', function (Blueprint $table) {
            $table->dropColumn('title_type');
        });
    }
}
