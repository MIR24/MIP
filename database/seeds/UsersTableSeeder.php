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
        DB::table('users')->truncate();
        factory(App\User::class)->create([
            'name' => 'Тест Тестович Тестовский',
            'email' => 'dev@mirtv.ru',
            'password' => '$2y$10$3e7oNVC9RB3BniKYDwHLWupztCGGCfociHvLSkuAwg6U4Yuhe3tBe',
            'status' => 'active',
            'organization_id' => 4
        ]);
        factory(App\User::class, 9)->create();
    }
}
