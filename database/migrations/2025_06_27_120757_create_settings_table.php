<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('settings')) {

            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('site_name', 100)->nullable();
                $table->string('site_email', 100)->nullable();
                $table->string('site_phone_number', 100)->nullable();
                $table->string('tin', 500)->nullable();
                $table->string('site_logo', 100)->nullable();
                $table->string('site_footer', 100)->nullable();
                $table->string('site_address', 100)->nullable();
                $table->string('site_description', 100)->nullable();
                $table->string('notify_templates', 100)->nullable();
                $table->string('notifications_email', 100)->nullable();
                $table->string('invite_templates', 100)->nullable();
                $table->integer('notifications_sms')->nullable();
                $table->string('sms_gateway', 100)->nullable();
                $table->string('front_end_enable_disable', 100)->nullable();
                $table->string('terms_condition', 100)->nullable();
                $table->string('welcome_screen', 100)->nullable();
                $table->string('twilio_disabled', 100)->nullable();
                $table->string('mail_disabled', 100)->nullable();
                $table->string('locale', 100)->nullable();
                $table->string('timezone', 100)->nullable();
                $table->string('mail_host', 100)->nullable();
                $table->string('mail_port', 100)->nullable();
                $table->string('mail_username', 100)->nullable();
                $table->string('mail_password', 100)->nullable();
                $table->string('mail_from_name', 100)->nullable();
                $table->string('mail_from_address', 100)->nullable();
                $table->string('twilio_auth_token', 100)->nullable();
                $table->string('twilio_account_sid', 100)->nullable();
                $table->string('twilio_from', 100)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
