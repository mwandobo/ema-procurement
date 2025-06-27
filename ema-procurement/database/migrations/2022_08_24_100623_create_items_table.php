<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_items')){
        Schema::create('pos_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost_price',$total=38,$places=2);
            $table->decimal('sales_price',$total=38,$places=2);
            $table->decimal('empty',$total=38,$places=2);
            $table->decimal('bottle',$total=38,$places=2);
            $table->decimal('quantity',$total=38,$places=2)->default('0')->nullable();
            $table->string('unit');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('pos_items');
    }
}
