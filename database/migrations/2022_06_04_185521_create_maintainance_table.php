<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintainanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintainances', function (Blueprint $table) {
            $table->id();
            $table->string('facility');
            $table->string('type');
            $table->string('personel');
            $table->text('reason')->nullable();
            $table->string('mechanical');
            $table->date('date');
            $table->integer('status')->comment('0=incomplete,1=complete');
            $table->string('maintainance_type');
            $table->integer('report')->nullable()->default('0');
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
        Schema::dropIfExists('maintainance');
    }
}
