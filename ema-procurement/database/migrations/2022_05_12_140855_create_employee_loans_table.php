<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_loans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('loan_amount');
            $table->string('paid_amount');
            $table->string('sponsor')->nullable();
            $table->string('deduct_month');
            $table->text('reason')->nullable();
            $table->integer('returns');
            $table->date('request_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('status')->comment('0=pending,1=approved,2=reject,3-partially_paid,4=paid');
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
        Schema::dropIfExists('employee_loans');
    }
}
