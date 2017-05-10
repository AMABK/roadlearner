<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcCrspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_crsps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make_id')->nullable();
            $table->string('model')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('crsp')->nullable();
            $table->date('upload_date');
            $table->integer('user_id');
            $table->integer('status')->default(1);
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
        Schema::drop('mc_crsps');
    }
}
