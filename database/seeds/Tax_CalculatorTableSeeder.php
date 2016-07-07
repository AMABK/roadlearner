<?php

use Illuminate\Database\Seeder;

class Tax_CalculatorTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('tax_calculators')->insert(array(
            array(
                'item_type' => 'motorvehicle',
                'depreciation' => '0',
                'extra_depreciation' => '0',
                'custom_value' => '0',
                'import_duty' => 25,
                'excise_duty' => 20,
                'vat_value' => '',
                'vat' => 16,
                'taxes' => '',
                'rdl' => 1.5,
                'idf_fees' => 2.25,
                'grand_total' => '',
                'others' => ''
            ),
            array(
                'item_type' => 'primemover',
                'depreciation' => '0',
                'extra_depreciation' => '0',
                'custom_value' => '0',
                'import_duty' => 10,
                'excise_duty' => 20,
                'vat_value' => '',
                'vat' => 16,
                'taxes' => '',
                'rdl' => 1.5,
                'idf_fees' => 2.25,
                'grand_total' => '',
                'others' => ''
            ),
            array(
                'item_type' => 'tractor',
                'depreciation' => '0',
                'extra_depreciation' => '0',
                'custom_value' => '0',
                'import_duty' => 10,
                'excise_duty' => 20,
                'vat_value' => '',
                'vat' => 16,
                'taxes' => '',
                'rdl' => 1.5,
                'idf_fees' => 2.25,
                'grand_total' => '',
                'others' => ''
            ),
            array(
                'item_type' => 'motorcycle',
                'depreciation' => '0',
                'extra_depreciation' => '0',
                'custom_value' => '0',
                'import_duty' => 10,
                'excise_duty' =>'N/A',
                'vat_value' => '',
                'vat' => 16,
                'taxes' => '',
                'rdl' => 1.5,
                'idf_fees' => 2.25,
                'grand_total' => '',
                'others' => ''
            ),
        ));
    }

}
