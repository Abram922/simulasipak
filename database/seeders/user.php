<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'role' => 1,
                'email' =>  'admin@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'id' => 2,
                'name' => 'Abram Wirayuda Pane',
                'role' => 2,
                'email' =>  'abram@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'id' => 3,
                'name' => 'BAA IT DEL',
                'role' => 3,
                'email' =>  'baa@gmail.com',
                'password' => bcrypt('12345678')
            ], 
        ]);
    }
}
    