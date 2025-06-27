<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_deposit')){
        Schema::create('tbl_deposit', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('bank_id');          
            $table->string('name')->nullable();
            $table->string('trans_id')->nullable();
            $table->decimal('amount',$total=38,$places=2);
            $table->date('date');
            $table->string('reference');
            $table->string('type');
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
            $table->string('exchange_rate')->nullable();
            $table->decimal('exchange_code',$total=38,$places=2)->nullable();
            $table->integer('added_by');
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
        Schema::dropIfExists('tbl_deposits');
    }
}
