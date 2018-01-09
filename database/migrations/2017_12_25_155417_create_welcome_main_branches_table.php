<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeMainBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_main_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telegram_id')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('x_direction')->nullable();
            $table->string('y_direction')->nullable();
            $table->unsignedSmallInteger('map_zoom')->nullable();
            $table->text('passage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_main_branches');
    }
}
