<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleQuotationItemTable extends Migration
{
    public function up()
    {
        Schema::create('sale_quotation_item', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sale_quotation_id');
            $table->integer('item_id');   // changed from unsignedBigInteger
            $table->unsignedBigInteger('store_id');  // changed from unsignedBigInteger

            $table->integer('quantity');
            $table->decimal('price', 15, 2);
            $table->string('unit');

            $table->timestamps();

            $table->foreign('sale_quotation_id')->references('id')->on('sale_quotations')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('store_pos_items')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('locations')->onDelete('restrict');
        });

    }

    public function down()
    {
        Schema::dropIfExists('sale_quotation_item');
    }
}
