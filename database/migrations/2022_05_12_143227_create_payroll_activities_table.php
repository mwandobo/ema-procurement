<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_activities', function (Blueprint $table) {
            $table->id();
            $table->string('module_id');
            $table->string('module');
            $table->string('activity');
            $table->timestamp('request_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('payroll_activities');
    }
}
