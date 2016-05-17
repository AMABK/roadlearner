<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_signs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sign_type');
            $table->string('sign_name')->nullable();
            $table->longText('sign_desc')->nullable();
            $table->string('sign_link')->nullable();
            $table->integer('ts_status')->default(1);
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
        Schema::drop('traffic_signs');
    }
}
