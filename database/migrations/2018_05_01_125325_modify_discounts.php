<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->unsignedInteger('room_id')->after('id')->default(0);
            $table->unsignedInteger('period_id')->after('room_id')->default(0);
            $table->string('service_id')->after('percent')->nullable();
            $table->string('service_type')->after('service_id')->nullable();
            $table->date('expire_date')->after('service_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->dropColumn(['room_id','period_id','service_id','service_type','expire_date']);
        });
    }
}
