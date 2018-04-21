<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WelcomeMainSectionsVisibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_headers', function(Blueprint $table){
            $table->boolean('visible')->default(1)->after('instagram_id');
            $table->boolean('menu_visible')->default(1)->after('visible');
        });
        Schema::table('welcome_footers', function(Blueprint $table){
            $table->boolean('visible')->default(1)->after('quote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_headers', function(Blueprint $table){
            $table->dropColumn(['visible','menu_visible']);
        });
        Schema::table('welcome_footers', function(Blueprint $table){
            $table->dropColumn('visible');
        });
    }
}
