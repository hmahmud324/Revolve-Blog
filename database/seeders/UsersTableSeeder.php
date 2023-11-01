<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('11111'),
            'role'      => 'admin',
        ],
        [
            'name'      => 'User',
            'email'     => 'website@gmail.com',
            'password'  => bcrypt('22222'),
            'role'      => 'website',
        ],

        ]);
    }
}
