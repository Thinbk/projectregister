<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'user_type' => 3, //admin
        ]);
        DB::table('users')->insert([
            'username' => 'teacher1',
            'email' => 'teacher1@email.com',
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);
        DB::table('users')->insert([
            'username' => 'teacher2',
            'email' => 'teacher2@email.com',
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);
        DB::table('users')->insert([
            'username' => 'teacher3',
            'email' => 'teacher3@email.com',
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);
        DB::table('users')->insert([
            'username' => 'teacher4',
            'email' => 'teacher4@email.com',
            'password' => bcrypt('12345678'),
            'user_type' => 2, // lecture
        ]);
        DB::table('users')->insert([
            'username' => 'student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'user_type' => 1, //student
        ]);
    }
}
