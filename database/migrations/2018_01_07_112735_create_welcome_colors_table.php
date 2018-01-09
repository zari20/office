<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('layout_background')->nullable();
            $table->string('layout_text')->nullable();
            $table->string('organ_color_1')->nullable();
            $table->string('organ_color_2')->nullable();
            $table->timestamps();
        });

        \DB::table('welcome_colors')->insert([
            'layout_background' => 'black',
            'layout_text' => 'white',
            'organ_color_1' => 'cyan',
            'organ_color_2' => 'gold',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_colors');
    }
}
