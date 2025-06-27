<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_return_invoices')){
        Schema::create('pos_return_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('reference_no');
            $table->string('client_id');
            $table->date('return_date');
            $table->date('due_date');
            $table->string('location')->nullable();
            $table->string('exchange_rate');
            $table->string('exchange_code');
            $table->decimal('invoice_amount',$total=38,$places=2);
            $table->decimal('due_amount',$total=38,$places=2);
            $table->decimal('invoice_tax',$total=38,$places=2);
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
        Schema::dropIfExists('pos_return_invoices');
    }
}
