<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fine_deduction')->nullable();
            $table->string('payment_type');
            $table->string('payment_month');
            $table->text('comments')->nullable();
            $table->string('account_id');
            $table->timestamp('paid_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('deduct_from')->nullable();
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
        Schema::dropIfExists('salary_payments');
    }
}
