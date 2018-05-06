<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZarinPalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zarin_pals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aid'); //authority id
            $table->string('mid'); //merchant id
            $table->unsignedInteger('rid')->nullable(); //red id
            $table->unsignedBigInteger('amount');
            $table->string('callback_url');
            $table->string('type');
            $table->string('description');
            $table->integer('status');
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
        Schema::dropIfExists('zarin_pals');
    }
}
