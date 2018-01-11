<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WelcomeSectionMorphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_sections', function (Blueprint $table) {
            $table->unsignedInteger("fragment_id")->default(0)->after('type');
            $table->string("fragment_type")->nullable()->after('fragment_id');
            $table->index(["fragment_id", "fragment_type"]);
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
            $table->dropColumn(['fragment_id','fragment_type']);
        });
    }
}
