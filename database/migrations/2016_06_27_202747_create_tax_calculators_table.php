<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_type');
            $table->float('depreciation')->default(0);
            $table->float('extra_depreciation')->default(0);
            $table->float('custom_value')->default(0);
            $table->float('import_duty')->default(0);
            $table->float('excise_duty')->default(0);
            $table->float('vat_value')->default(0);
            $table->float('vat')->default(0);
            $table->float('taxes')->default(0);
            $table->float('idf_fees')->default(0);
            $table->float('rdl')->default(0);
            $table->float('grand_total')->default(0);
            $table->float('others')->default(0);
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
        Schema::drop('tax_calculators');
    }
}
