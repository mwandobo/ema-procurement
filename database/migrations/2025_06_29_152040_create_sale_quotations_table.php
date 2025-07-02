<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sale_quotations')){
        Schema::create('sale_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('sale_pre_quotation_id')->nullable();
            $table->string('reference_no')->unique();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('credibility_amount')->nullable();
            $table->string('needs_credibility_approved')->nullable();
            $table->string('credibility_approved_1')->nullable();
            $table->string('credibility_approved_2')->nullable();
            $table->unsignedBigInteger('credibility_approved_1_by')->nullable();
            $table->unsignedBigInteger('credibility_approved_2_by')->nullable();
            $table->date('credibility_approved_1_date')->nullable();
            $table->date('credibility_approved_2_date')->nullable();

            // Add foreign key constraints (optional but recommended)
            $table->foreign('sale_pre_quotation_id')->references('id')->on('sale_pre_quotations')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('store_pos_clients')->onDelete('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('credibility_approved_1_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('credibility_approved_2_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::table('sale_quotations', function (Blueprint $table) {
            //
        });
    }
}
