<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Roadlearner',
            'email' => 'admin@optimuse-solutions.com',
            'password' => bcrypt('mkulim@24'),
        ]);
    }

}
