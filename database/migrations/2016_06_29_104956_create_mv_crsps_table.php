<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMvCrspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mv_crsps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id');
            $table->string('model')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('body_type')->nullable();
            $table->string('drive_config')->nullable();
            $table->string('seating')->nullable();
            $table->string('fuel')->nullable();
            $table->string('gvw')->nullable();
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
        Schema::drop('mv_crsps');
    }
}
