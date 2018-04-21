<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropVisiblesInWelcomeSectionsAndTabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_sections', function (Blueprint $table) {
            $table->dropColumn('visible');
        });
        Schema::table('welcome_tabs', function (Blueprint $table) {
            $table->dropColumn('visible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_sections', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
        });
        Schema::table('welcome_tabs', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
        });
    }
}
