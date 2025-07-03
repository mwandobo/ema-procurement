<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTaxInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            if(!Schema::hasTable('sale_tax_invoices')) {
                Schema::create('sale_tax_invoices', function (Blueprint $table) {
                    $table->id();
                    $table->string('reference_no')->unique();
                    $table->unsignedBigInteger('sale_order_id')->nullable();
                    $table->unsignedBigInteger('sale_quotation_id')->nullable();
                    $table->unsignedBigInteger('sale_pre_quotation_id')->nullable();
                    $table->string('amount')->nullable();
                    $table->string('tax_amount')->nullable();
                    $table->string('total_amount')->nullable();
                    $table->string('status')->nullable();
                    $table->string('approved_1')->nullable();
                    $table->unsignedBigInteger('added_by')->nullable();
                    $table->unsignedBigInteger('approved_1_by')->nullable();
                    $table->date('approved_1_date')->nullable();
                    $table->foreign('sale_order_id')->references('id')->on('sale_orders')->onDelete('cascade');
                    $table->foreign('sale_quotation_id')->references('id')->on('sale_quotations')->onDelete('cascade');
                    $table->foreign('sale_pre_quotation_id')->references('id')->on('sale_pre_quotations')->onDelete('cascade');
                    $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
                    $table->foreign('approved_1_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('tax_invoices');
    }
}
