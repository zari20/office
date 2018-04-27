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
            foreach (range(1,7) as $key2 => $i) {
                foreach ( array_combine(['08:30','14:00','19:30'],['13:30','19:00','22:30']) as $from => $untill) {
                    \DB::table('periods')->insert([
                        'day_id'=>$i,
                        'room_id'=>$room->id,
                        'from'=>$from,
                        'till'=>$untill
                    ]);
                }
            }
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
