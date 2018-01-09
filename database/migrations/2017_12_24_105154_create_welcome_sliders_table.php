<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('button_name')->nullable();
            $table->string('button_link')->nullable();
            $table->string('background_path')->nullable();
            $table->timestamps();
        });

        for ($i=0; $i < 3 ; $i++) {
            \DB::table('welcome_five_cols')->insert([
                'title' => 'عنوان اسلایدر',
                'body' =>  'لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند.',
                'button_name' => 'نام دکمه',
                'button_link' => '#',
                'background_path' => 'slider/'.$i.'.png',
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
        Schema::dropIfExists('welcome_sliders');
    }
}
