<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyWelcomeProductToMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_products', function (Blueprint $table) {
            $table->unsignedInteger('section_id')->default(0)->after('id');
            $table->string('passage')->nullable()->after('button_name');
            $table->dropColumn('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_products', function (Blueprint $table) {
            $table->dropColumn(['section_id','passage']);
            $table->string('body')->nullable()->after('button_name');
        });
    }
}
