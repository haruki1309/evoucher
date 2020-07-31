<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->boolean('is_admin');
            $table->boolean('is_brand_owner');
            $table->bigInteger('brand_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('avt_url');
            $table->boolean('is_activated');
            $table->string('lang_key');
            $table->string('activation_key');
            $table->string('reset_key');
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('reset_date')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
