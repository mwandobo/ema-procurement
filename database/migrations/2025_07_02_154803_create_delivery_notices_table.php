<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('delivery_notices')) {
            Schema::create('delivery_notices', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('sale_order_id')->nullable();
                $table->string('reference_no')->unique();
                $table->unsignedBigInteger('added_by')->nullable();
                $table->string('status')->nullable();
                $table->string('amount')->nullable();
                $table->string('approved_1')->nullable();
                $table->unsignedBigInteger('approved_1_by')->nullable();
                $table->date('approved_1_date')->nullable();

                // Add foreign key constraints (optional but recommended)
                $table->foreign('sale_order_id')->references('id')->on('sale_orders')->onDelete('cascade');
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
        Schema::table('delivery_notices', function (Blueprint $table) {
            //
        });
    }
}
