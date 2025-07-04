<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            if(!Schema::hasTable('tbl_countries')){
                Schema::create('tbl_countries', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
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
        Schema::dropIfExists('tbl_countries');
    }
}
