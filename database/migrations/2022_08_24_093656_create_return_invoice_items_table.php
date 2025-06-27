<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_return_invoice_items')){
        Schema::create('pos_return_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('return_id');
            $table->string('item_name');
            $table->decimal('invoice_amount',$total=38,$places=2);
            $table->decimal('invoice_tax',$total=38,$places=2);
            $table->string('reference_no');
            $table->decimal('tax_rate',$total=38,$places=2);
            $table->decimal('total_tax',$total=38,$places=2);
            $table->decimal('quantity',$total=38,$places=2);
            $table->decimal('due_amount',$total=38,$places=2);
            $table->decimal('total_cost',$total=38,$places=2);
            $table->decimal('price',$total=38,$places=2);
            $table->string('unit');
            $table->string('items_id');
            $table->string('return_item');
            $table->string('order_no');
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
        Schema::dropIfExists('pos_return_invoice_items');
    }
}
