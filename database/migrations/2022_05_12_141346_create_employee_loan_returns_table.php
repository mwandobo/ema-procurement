<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLoanReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_loan_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->decimal('loan_amount');
            $table->integer('loan_id');
            $table->string('deduct_month');
            $table->date('request_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('status')->comment('0=pending,1=approved,2=reject,3=paid');
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
        Schema::dropIfExists('employee_loan_returns');
    }
}
