<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWelcomeMainBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_main_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('number')->nullable();
            $table->string('title')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('x_direction')->default('0');
            $table->string('y_direction')->default('0');
            $table->unsignedSmallInteger('map_zoom')->default(15);
            $table->text('passage')->nullable();
            $table->timestamps();
        });

        \DB::table('welcome_main_branches')->insert([
            'title' => 'اطلاعات تماس',
            'passage' => '
                ایران - تهران
                خیابان اول - کوچه دوم - پلاک سوم
                تلفن: 09123456789 - 091213456789
                ایمیل: name@example.com
                ساعت کاری: شنبه تا پنج شنبه 8 - 22
            ',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_main_branches');
    }
}
