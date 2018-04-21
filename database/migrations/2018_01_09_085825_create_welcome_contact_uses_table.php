<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_contact_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('main_branch_title')->nullable();
            $table->string('other_branches_title')->nullable();
            $table->string('form_title')->nullable();
            $table->boolean('visible')->default(1);
            $table->boolean('form_visible')->default(1);
            $table->string('background_path')->nullable();
            $table->timestamps();
        });

        \DB::table('welcome_contact_uses')->insert([
            'title' => 'ارتباط با ما',
            'main_branch_title' => 'ارتباط با دفتر مرکزی',
            'other_branches_title' => 'ارتباط با شعب',
            'form_title' => 'فرم تماس با ما',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_contact_uses');
    }
}
