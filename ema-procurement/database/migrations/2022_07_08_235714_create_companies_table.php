<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('organization');
            $table->string('regDate');
            $table->string('regNo');
            $table->integer('employeeNo');
            $table->string('regHead');
            $table->string('employeeBox');
            $table->string('tinNo');

            $table->string('phone');
            $table->string('contactName');
            $table->string('email');
            $table->string('personalPhone');

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
        Schema::dropIfExists('companies');
    }
}
