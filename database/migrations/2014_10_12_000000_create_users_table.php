<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('telephone')->nullable()->unique();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('region')->nullable();
            $table->text('address')->nullable();
            $table->unsignedInteger('postal_code')->nullable();
            $table->string('password');
            $table->string('type')->default('regular');
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::table('users')->insert([
            'username' => 'admin',
            'mobile' => '09183366244',
            'password' => bcrypt('1q2w3e'),
            'type' => 'admin'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
