<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('user_type') ; 
            $table->decimal('total',$total = 38, $places = 2);  
            $table->decimal('tax',$total = 38, $places = 2);
            $table->decimal('due_amount',$total = 38, $places = 2);
            $table->string('status') ; 
            $table->string('reference') ;
            $table->string('added_by');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
