<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_layouts', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('puzzle');
            $table->unsignedSmallInteger('position')->nullable();
            $table->boolean('visible')->default(1);
            $table->timestamps();
        });

        \DB::table('welcome_layouts')->insert([
            'puzzle_id' => 1,
            'puzzle_type' => 'App\Welcome\WelcomeContactUs',
            'position' => 1,
            'visible' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_layouts');
    }
}
