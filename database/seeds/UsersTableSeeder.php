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
            'sex' => null,
            'job' => null,
            'age' => null,
            'email' => 'test@test.com',
            'description' => null,
            'password' => bcrypt('111111'),
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);

        $sex = ['男性', '中性', '女性'];
        $age = ['10代', '20代', '30代', '40代', '50代', '60代', '70代', '80代', '90代'];

        // ランダムにユーザーを作成
        for ($i = 0; $i < 100; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->unique()->userName(),
                'sex' => $faker->randomElement($sex),
                'job' => $faker->numberBetween(0,15),
                'age' => $faker->randomElement($age),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('111111'),
                'email_verified_at' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
