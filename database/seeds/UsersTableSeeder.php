<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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

        // 固定ユーザーを作成
        DB::table('users')->insert([
            'name' => '訓志',
            'email' => 'test@test.com',
            'password' => bcrypt('111111'),
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);

        // ランダムにユーザーを作成
        for ($i = 0; $i < 19; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('111111'),
                'email_verified_at' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
