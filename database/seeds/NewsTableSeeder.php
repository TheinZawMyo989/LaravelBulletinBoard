<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
        [
            'title' => 'Title One',
            'content' => 'Hello World',
            'created_at' => '2020-02-15 16:59:59',
            'updated_at' => null,
            'user_id' => 1
        ],
        [
            'title' => 'Title Two',
            'content' => 'Hello World',
            'created_at' => '2020-02-15 16:59:59',
            'updated_at' => null,
            'user_id' => 1
        ],
        [
            'title' => 'Title three',
            'content' => 'Hello World',
            'created_at' => '2020-02-15 16:59:59',
            'updated_at' => null,
            'user_id' => 1
        ]
        ]);
    }
}
