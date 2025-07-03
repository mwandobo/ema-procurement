<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDeliveredItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('delivered_items')) {
            Schema::create('delivered_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('delivery_notice_id');
                $table->integer('item_id');   // changed from unsignedBigInteger
                $table->integer('ordered_quantity');
                $table->integer('delivered_quantity');
                $table->timestamps();
                $table->foreign('delivery_notice_id')->references('id')->on('delivery_notices')->onDelete('cascade');
                $table->foreign('item_id')->references('id')->on('store_pos_items')->onDelete('cascade');
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
        Schema::table('delivered_items', function (Blueprint $table) {
            //
        });
    }
}
