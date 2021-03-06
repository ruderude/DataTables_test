<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fakerを使う
        $faker = Faker\Factory::create('ja_JP');

        // ランダムに記事を作成
        for ($i = 0; $i < 50; $i++)
        {
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 4),
                'title' => $faker->text(20),
                'body' => $faker->text(200),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
