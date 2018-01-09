<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeFiveColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_five_cols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable();
            $table->string('icon')->nullable();
            $table->string('href')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        for ($i=0; $i < 5 ; $i++) {
            \DB::table('welcome_five_cols')->insert([
                'subject' => 'عنوان ستون',
                'icon' => 'font-awesome',
                'href' => '#',
                'info' => 'لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند.',
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
        Schema::dropIfExists('welcome_five_cols');
    }
}
