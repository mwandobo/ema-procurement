<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('advance_amount');
            $table->string('deduct_month');
            $table->text('reason')->nullable();
            $table->timestamp('request_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('status')->comment('0 =pending,1=accpect,2 = reject and 3 = paid');
            $table->integer('approve_by')->nullable();
            $table->integer('added_by');
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
        Schema::dropIfExists('advance_salaries');
    }
}
