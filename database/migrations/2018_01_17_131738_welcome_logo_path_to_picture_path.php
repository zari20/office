<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WelcomeLogoPathToPicturePath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('ALTER TABLE `welcome_top_links` CHANGE COLUMN `logo_path` `picture_path` VARCHAR(191)');
        \DB::statement('ALTER TABLE `welcome_logos` CHANGE COLUMN `logo_path` `picture_path` VARCHAR(191)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('ALTER TABLE `welcome_top_links` CHANGE COLUMN `picture_path` `logo_path` VARCHAR(191)');
        \DB::statement('ALTER TABLE `welcome_logos` CHANGE COLUMN `picture_path` `logo_path` VARCHAR(191)');
    }
}
