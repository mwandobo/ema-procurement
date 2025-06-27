<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_purchases_history')){
        Schema::create('pos_purchases_history', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('purchase_id');
            $table->string('item_id');
            $table->decimal('quantity',$total=38,$places=2);
            $table->string('supplier_id');
            $table->date('purchase_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('return_id')->nullable();
            $table->date('return_date')->nullable();
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
        
        Schema::dropIfExists('pos_purchases_history');
    }
}
