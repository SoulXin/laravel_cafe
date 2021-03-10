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
        DB::table('users')->insert([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('user'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tester',
            'username' => 'tester',
            'password' => bcrypt('tester'),
        ]);
    }
}
