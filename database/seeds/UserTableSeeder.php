<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(6),
            'email' => strtolower(str_random(6)).'@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => '2020-02-15 16:59:59'
        ]);
    }
}
