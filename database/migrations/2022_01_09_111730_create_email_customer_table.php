<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_customer', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('email_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('email_id')->references('id')->on('predefined_emails');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
            $table->primary('id'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_customer');
    }
}
