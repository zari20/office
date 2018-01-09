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
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        \DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('1q2w3e'),
            'admin' => 1
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
