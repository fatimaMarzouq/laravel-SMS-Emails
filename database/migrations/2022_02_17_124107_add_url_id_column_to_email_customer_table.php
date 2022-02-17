<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlIdColumnToEmailCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('url_id');
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_customer', function (Blueprint $table) {
            $table->dropForeign('url_id');
            $table->dropColumn('url_id');
        });
    }
}
