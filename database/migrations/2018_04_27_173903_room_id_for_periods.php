<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomIdForPeriods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periods', function (Blueprint $table) {
            $table->unsignedInteger('room_id')->after('day_id');
        });

        //empty periods table
        DB::table('periods')->truncate();

        //insert periods for every rooms
        $rooms = \DB::table('room_types')->get();
        foreach ($rooms as $key1 => $room) {
            \App\Period::create_defaults($room->id);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('periods', function (Blueprint $table) {
            $table->dropColumn('room_id');
        });
    }
}
