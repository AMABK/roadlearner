<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
// $this->call(UserTableSeeder::class);
        Model::unguard();

     //$this->call(UserTableSeeder::class);
     //$this->call(Tax_CalculatorTableSeeder::class);

        Model::reguard();
    }
}
