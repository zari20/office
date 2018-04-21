<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPreviousWelcomeFragmentsForOrm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_five_cols', function (Blueprint $table) {
            $table->unsignedInteger('section_id')->default(0)->after('id');
        });
        Schema::table('welcome_links', function (Blueprint $table) {
            $table->unsignedInteger('section_id')->default(0)->after('id');
        });
        Schema::table('welcome_sliders', function (Blueprint $table) {
            $table->unsignedInteger('section_id')->default(0)->after('id');
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
            $table->dropColumn('section_id');
        });
        Schema::table('welcome_links', function (Blueprint $table) {
            $table->dropColumn('section_id');
        });
        Schema::table('welcome_sliders', function (Blueprint $table) {
            $table->dropColumn('section_id');
        });
    }
}
