<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_awards', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('award_amount');
            $table->string('award_name');
            $table->string('gift_item');
            $table->string('award_date');
            $table->date('given_date')->nullable();
            $table->integer('status')->comment('0 =pending,1=accpect,2 = reject and 3 = paid');
            $table->integer('view')->nullable()->comment('1=read,2 = unread');
            $table->integer('approve_by')->nullable();
            $table->integer('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_awards');
    }
}
