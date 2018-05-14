<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('zarin_pal_id')->nullable();
            $table->string('discount_code_id')->default(0);
            $table->unsignedInteger('find_out_id')->nullable();
            $table->smallInteger('status')->default(0);
            $table->unsignedBigInteger('room_cost');
            $table->unsignedBigInteger('payable_amount');
            $table->unsignedBigInteger('total_cost');
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
        Schema::dropIfExists('reserves');
    }
}
