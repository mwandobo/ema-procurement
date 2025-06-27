<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_leave_application', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->integer('leave_category_id');
            $table->text('reason')->nullable();
            $table->enum('leave_type', ['single_day', 'multiple_days', 'hours']);
            $table->string('hours')->nullable();
            $table->date('leave_start_date');
            $table->date('leave_end_date')->nullable();
            $table->integer('application_status')->comment('1=pending,2=accepted 3=rejected');
            $table->date('application_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('attachment')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
