<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_footers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('passage')->nullable();
            $table->string('copy_right')->nullable();
            $table->string('links_title')->nullable();
            $table->string('quote')->nullable();
            $table->timestamps();
        });

        \DB::table('welcome_footers')->insert([
            'title' => 'عنوان فوتر',
            'passage' => 'لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند. لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند.',
            'copy_right' => 'جمله کپی رایت',
            'links_title' => 'لینک های مرتبط',
            'quote' => 'طراحی شده توسط رویان',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_footers');
    }
}
