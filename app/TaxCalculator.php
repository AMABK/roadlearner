<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxCalculator extends Model {

    protected $table = 'tax_calculators';
    protected $fillable = ['item_type', 'depreciation', 'extra_depreciation', 'custom_value', 'import_duty', 'excise_duty', 'vat_value', 'vat', 'taxes','rdl', 'idf_fees', 'grand_total', 'others'];

}
