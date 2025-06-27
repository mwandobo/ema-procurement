<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmptyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_empty_history')){
        Schema::create('pos_empty_history', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('purpose');
            $table->string('purchase_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('return_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('has_empty');
            $table->text('description')->nullable();
            $table->string('return_type')->nullable();
            $table->decimal('empty_in_purchase',$total=38,$places=2)->nullable();
            $table->decimal('empty_on_purchase_return',$total=38,$places=2)->nullable();
            $table->decimal('empty_out_purchase',$total=38,$places=2)->nullable();
            $table->decimal('empty_out_sales',$total=38,$places=2)->nullable();
            $table->decimal('empty_on_sales_return',$total=38,$places=2)->nullable();
            $table->decimal('empty_in_sales',$total=38,$places=2)->nullable();
            $table->decimal('purchase_bottle',$total=38,$places=2)->nullable();
            $table->decimal('purchase_case',$total=38,$places=2)->nullable();
            $table->decimal('sales_bottle',$total=38,$places=2)->nullable();
            $table->decimal('sales_case',$total=38,$places=2)->nullable();
            $table->decimal('return_bottle',$total=38,$places=2)->nullable();
            $table->decimal('return_case',$total=38,$places=2)->nullable();
            $table->decimal('return_purchase',$total=38,$places=2)->nullable();
            $table->decimal('return_sales',$total=38,$places=2)->nullable();
            $table->decimal('returned_bottle',$total=38,$places=2)->nullable();
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
        Schema::dropIfExists('pos_empty_history');
    }
}
