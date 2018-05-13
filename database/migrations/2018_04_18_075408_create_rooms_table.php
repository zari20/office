<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedSmallInteger('capacity');
            $table->unsignedBigInteger('cost_pre_hour');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        \DB::table('rooms')->insert([
            [
                'name' => 'سالن 3+17 نفره',
                'capacity' => 20,
                'cost_pre_hour' => 25000,
                'description' => 'توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات'
            ],
            [
                'name' => 'سالن 7 نفره',
                'capacity' => 7,
                'cost_pre_hour' => 10000,
                'description' => 'توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
