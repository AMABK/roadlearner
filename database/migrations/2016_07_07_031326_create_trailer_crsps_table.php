<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailerCrspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailer_crsps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id')->nullable();
            $table->string('model')->nullable();
            $table->string('hst')->nullable();
            $table->string('axel_weight')->nullable();
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
        Schema::drop('trailer_crsps');
    }
}
