<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_transactions')){
        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('module');
            $table->string('module_id');
            $table->string('account_id');
            $table->string('code_id')->nullable();          
            $table->string('name')->nullable();
            $table->string('transaction_prefix')->nullable();
            $table->enum('type', ['Income', 'Expense', 'Transfer']);
            $table->decimal('amount',$total=38,$places=2)->default('0');
            $table->decimal('debit',$total=38,$places=2)->default('0');
            $table->decimal('credit',$total=38,$places=2)->default('0');
            $table->decimal('total_balance',$total=38,$places=2)->default('0');;
            $table->date('date');
            $table->string('paid_by')->nullable();
            $table->string('payment_methods_id')->nullable();
            $table->enum('status', ['non_approved', 'paid', 'unpaid'])->nullable();
            $table->text('notes')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
