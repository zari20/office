<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('number');
            $table->unsignedSmallInteger('latin_number');
            $table->timestamps();
        });

        foreach (range(0,6) as $key => $value) {
            $latin_day = ($value < 2) ? ($value + 6) : ($value - 1);
            \DB::table('days')->insert([
                'number'=>$value,
                'latin_number'=>$latin_day
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
