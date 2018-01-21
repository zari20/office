<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumberForEverything extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_five_cols', function (Blueprint $table) {
            $table->unsignedInteger('number')->after('id')->nullable();
        });
        Schema::table('welcome_links', function (Blueprint $table) {
            $table->unsignedInteger('number')->after('id')->nullable();
        });
        Schema::table('welcome_menus', function (Blueprint $table) {
            $table->unsignedInteger('number')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_five_cols', function (Blueprint $table) {
            $table->dropColumn('number');
        });
        Schema::table('welcome_links', function (Blueprint $table) {
            $table->dropColumn('number');
        });
        Schema::table('welcome_menus', function (Blueprint $table) {
            $table->dropColumn('number');
        });
    }
}
