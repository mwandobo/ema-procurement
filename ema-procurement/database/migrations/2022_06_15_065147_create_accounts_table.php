<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_account_details')){
        Schema::create('tbl_account_details', function (Blueprint $table) {
            $table->id();
            $table->string('account_id')->unique();
            $table->string('account_name');
            $table->decimal('balance',$total=38,$places=2);
            $table->string('exchange_code')->nullable()->default('TZS');
            $table->string('account_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_phone')->nullable();
            $table->text('bannk_details')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
