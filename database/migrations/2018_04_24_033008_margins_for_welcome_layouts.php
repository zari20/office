<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarginsForWelcomeLayouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_layouts', function (Blueprint $table) {
            $table->integer('margin_bottom')->default(0)->after('container');
            $table->integer('margin_top')->default(0)->after('container');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_layouts', function (Blueprint $table) {
            $table->dropColumn(['margin_top','margin_bottom']);
        });
    }
}
