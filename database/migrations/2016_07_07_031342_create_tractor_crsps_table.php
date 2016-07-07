<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTractorCrspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tractor_crsps', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('make_id');
            $table->string('model')->nullable();
            $table->string('hp_cc')->nullable();
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
        Schema::drop('tractor_crsps');
    }
}
