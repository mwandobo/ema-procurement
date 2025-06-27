<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_temp_deposits', function (Blueprint $table) {
            $table->id();
            $table->integer('card_id');
            $table->integer('visitor_id');
            $table->integer('member_id');
            $table->integer('trans_id');
            $table->string('ref_no');
            $table->integer('debit');
            $table->integer('credit');
            $table->integer('status');
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
        Schema::dropIfExists('tbl_temp_deposits');
    }
}
