<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodIssueItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_good_issues_items')){
        Schema::create('pos_good_issues_items', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->integer('item_id');
            $table->integer('issue_id');
            $table->decimal('quantity',$total=38,$places=2);
            $table->integer('order_no');
            $table->integer('status');
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
        Schema::dropIfExists('pos_good_issues_items');
    }
}
