<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_training', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->text('remarks')->nullable();
            $table->string('training_name');
            $table->string('vendor_name');
            $table->decimal('training_cost');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->comment('0 = pending, 1 = started, 2 = completed, 3 = terminated');
            $table->integer('performance')->nullable()->default('0')->comment('0 = not concluded, 1 = satisfactory, 2 = average, 3 = poor, 4 = excellent');;
            $table->text('attachment')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
