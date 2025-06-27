<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('visiting_details')){
        Schema::create('visiting_details', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->string('purpose')->nullable();
            $table->string('company_name')->nullable();
            $table->dateTime('checkin_at')->nullable();
            $table->dateTime('checkout_at')->nullable();
            $table->string('status');
            $table->string('user_id');
            $table->string('employee_id');
            $table->string('visitor_id');
            $table->integer('card_id')->default('0');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visiting_details');
    }
}
