<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('nationality');
            $table->string('address');
            $table->string('gender');
            $table->string('email');
            $table->string('membership_class');
            $table->string('membership_reason');
            $table->string('other_info');
            $table->string('spouse_name');
            $table->string('proposer_name');
            $table->string('first_proposer');
            $table->string('second_proposer');
            $table->string('status');
            $table->string('added_by');
            $table->string('card_id');
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
        Schema::dropIfExists('members');
    }
}
