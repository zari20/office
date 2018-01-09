<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeFooterLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_footer_links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('welcome_footer_id')->default(1);
            $table->string('name')->nullable();
            $table->string('href')->default('#');
            $table->timestamps();
        });

        for ($i=1; $i <= 8 ; $i++) {
            \DB::table('welcome_footer_links')->insert([
                'name' => 'لینک شماره '.$i,
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
        Schema::dropIfExists('welcome_footer_links');
    }
}
