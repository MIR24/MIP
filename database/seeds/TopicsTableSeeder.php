<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->truncate();
        foreach (DB::table('users')->get(['id']) as $user) {
            factory(App\Topic::class, 22)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
