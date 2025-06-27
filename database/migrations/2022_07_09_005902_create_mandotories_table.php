<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandotoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandotories', function (Blueprint $table) {
            $table->id();

            $table->string('incorporationCertificate');
            $table->string('tinCertificate');
            $table->string('businessLicense');
            $table->string('organizationProfile');
            $table->string('membership');
            $table->text('infoRelevant');
            $table->text('reasons');

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
        Schema::dropIfExists('mandotories');
    }
}
