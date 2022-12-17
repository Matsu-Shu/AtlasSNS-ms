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
        //
        DB::table('users')->insert([
            [
                'username' => '一郎',
                'mail' => 'ichirou@xxxx.com',
                'password' => 'ichiroudayo1',
                'bio' => 'my name is Ichirou.',
            ]
        ]);
    }
}
