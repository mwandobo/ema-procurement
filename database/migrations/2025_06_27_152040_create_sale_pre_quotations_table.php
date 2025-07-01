<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePreQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sale_pre_quotations')){
        Schema::create('sale_pre_quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('reference_no')->unique();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->string('status')->nullable();
            $table->integer('amount')->nullable();
            // Add foreign key constraints (optional but recommended)
            $table->foreign('client_id')->references('id')->on('store_pos_clients')->onDelete('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::table('sale_pre_quotations', function (Blueprint $table) {
            //
        });
    }
}
