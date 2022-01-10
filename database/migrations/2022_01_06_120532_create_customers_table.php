<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->datetime('send_sms');
            $table->boolean('sms_sent')->default(0);
            $table->datetime('send_email1');
            $table->boolean('email1_sent')->default(0);
            $table->datetime('send_email2');
            $table->boolean('email2_sent')->default(0);
            $table->datetime('send_email3');
            $table->boolean('email3_sent')->default(0);
            $table->boolean('link_clicked')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
