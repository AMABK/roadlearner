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

// $this->call(UserTableSeeder::class);
        DB::table('users')->insert([
            'first_name' => 'Arnold',
            'last_name' => 'Karani',
            'email' => 'arnold.mate@optimuse-solutions.com',
            'password' => bcrypt('111111'),
        ]);

        Model::reguard();
    }
}
