<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('day_id');
            $table->time('from');
            $table->time('till');
            $table->timestamps();
        });

        foreach (range(1,7) as $key1 => $i) {
            foreach ( array_combine(['08:30','14:00','19:30'],['13:30','19:00','22:30']) as $from => $untill) {
                \DB::table('periods')->insert([
                    'day_id'=>$i,
                    'from'=>$from,
                    'till'=>$untill
                ]);
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
        Schema::dropIfExists('periods');
    }
}
