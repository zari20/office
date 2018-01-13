<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WelcomeContactUsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_contact_uses', function (Blueprint $table) {
            $table->dropColumn('visible');
        });
        Schema::table('welcome_main_branches', function (Blueprint $table) {
            $table->unsignedInteger('contact_us_id')->after('id')->default(1);
        });
        Schema::table('welcome_contact_branches', function (Blueprint $table) {
            $table->unsignedInteger('contact_us_id')->after('id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_contact_uses', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
        });
        Schema::table('welcome_main_branches', function (Blueprint $table) {
            $table->dropColumn('contact_us_id');
        });
        Schema::table('welcome_contact_branches', function (Blueprint $table) {
            $table->dropColumn('contact_us_id');
        });
    }
}
