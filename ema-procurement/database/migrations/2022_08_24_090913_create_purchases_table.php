<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_purchases')){
        Schema::create('pos_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->string('supplier_id');
            $table->date('purchase_date');
            $table->date('due_date');
            $table->string('location')->nullable();
            $table->string('exchange_rate');
            $table->string('exchange_code');
            $table->decimal('purchase_amount',$total=38,$places=2);
            $table->decimal('due_amount',$total=38,$places=2);
            $table->decimal('purchase_tax',$total=38,$places=2);
            $table->integer('status');
            $table->integer('good_receive');
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
        Schema::dropIfExists('pos_purchases');
    }
}
