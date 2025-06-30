<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('company_declarations')){
            Schema::create('company_declarations', function (Blueprint $table) {
                $table->id();

                $table->string('companyName2');
                $table->string('application');
                $table->string('applicationDate');
                $table->string('authorizedName');
                $table->string('agree');
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
        Schema::dropIfExists('company_declarations');
    }
}
