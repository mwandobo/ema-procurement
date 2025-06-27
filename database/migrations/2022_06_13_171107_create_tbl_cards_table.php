<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_cards')){
        Schema::create('tbl_cards', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable()->default('1');
            $table->integer('owner_id')->nullable();
            $table->integer('added_by')->nullable();
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
        Schema::dropIfExists('tbl_cards');
    }
}
