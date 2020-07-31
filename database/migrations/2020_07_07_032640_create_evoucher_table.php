<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoucher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('brand_id');
            $table->string('title', 1000);
            $table->string('value', 1000);
            $table->string('unit');
            $table->string('status')->default('new');
            $table->integer('qty');
            $table->longText('description');
            $table->longText('term');
            $table->string('image');
            $table->dateTime('issue_from');
            $table->dateTime('issue_until');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('evoucher');
    }
}
