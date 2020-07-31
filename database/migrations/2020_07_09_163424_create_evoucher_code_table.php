<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvoucherCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoucher_code', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('evoucher_id');
            $table->integer('brand_id');
            $table->integer('customer_id')->nullable()->default(null);
            $table->string('status');
            $table->string('code');
            $table->dateTime('redeem_date')->nullable()->default(null);
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
        Schema::dropIfExists('evoucher_code');
    }
}
