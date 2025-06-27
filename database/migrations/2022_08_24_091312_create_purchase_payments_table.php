<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_purchase_payments')){
        Schema::create('pos_purchase_payments', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_id');
            $table->string('account_id');  
            $table->string('trans_id');                              
            $table->decimal('amount',$total=38,$places=2);
            $table->date('date');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('pos_purchase_payments');
    }
}
