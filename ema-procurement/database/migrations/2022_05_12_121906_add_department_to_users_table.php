<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartmentToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password',function (Blueprint $table){
                $table->string('department_id')->nullable();
                $table->string('designation_id')->nullable();
                $table->integer('member_id')->nullable();
                $table->integer('visitor_id')->nullable();
                $table->integer('is_active')->default('0');
                $table->string('provider')->nullable();
                $table->string('provider_id')->nullable();
                $table->integer('added_by')->nullable();
                });
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department_id');
            $table->dropColumn('designation_id');
        });
    }
}
