<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('target')->nullable();
            $table->timestamps();
        });

        \DB::table('welcome_menus')->insert([
            'name' => 'عنوان سایت',
            'icon' => 'محل قرارگیری توضیحات',
            'target' => 'محل قرارگیری توضیحات',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_menus');
    }
}
