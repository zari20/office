<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reserve_id');
            $table->unsignedInteger('informing_type_id');
            $table->unsignedSmallInteger('count')->default(1);
            $table->unsignedBigInteger('cost');
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
        Schema::dropIfExists('informings');
    }
}
