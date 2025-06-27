<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('reference_no');
            $table->integer('fee_type');
            $table->integer('amount');
            $table->integer('due_amount');
            $table->integer('status');
            $table->integer('added_by');
            $table->date('date');
            $table->date('due_date');
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
        Schema::dropIfExists('membership_fees');
    }
}
