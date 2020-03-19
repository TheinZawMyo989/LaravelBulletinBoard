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
        // DB::table('news')->insert([
        // [
        //     'title' => 'Title One',
        //     'content' => 'Hello World',
        //     'image' => null,
        //     'created_at' => '2020-02-15 16:59:59',
        //     'updated_at' => null,
        //     'user_id' => 1
        // ],
        // [
        //     'title' => 'Title Two',
        //     'content' => 'Hello World',
        //     'image' => null,
        //     'created_at' => '2020-02-15 16:59:59',
        //     'updated_at' => null,
        //     'user_id' => 1
        // ],
        // [
        //     'title' => 'Title three',
        //     'content' => 'Hello World',
        //     'image' => null,
        //     'created_at' => '2020-02-15 16:59:59',
        //     'updated_at' => null,
        //     'user_id' => 1
        // ]
        // ]);
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 10; $i++):
            $arr = ['private', 'public'];
            DB::table('news')
                ->insert([
                    'title' => $faker->sentence,
                    'content' => $faker->paragraph,
                    'image' => 'storage/images/laravel.jpg', 
                    'public_flag' =>$arr[rand(0, 1)],
                    'created_at' => '2020-02-15 16:59:59',
                    'updated_at' => null,
                    'user_id' => factory('App\User')->create()->id,
                ]);
        endfor;
    }
}
