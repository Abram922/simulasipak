<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' =>1,
                'role' => 'admin'
            ],
            [
                'id' => 2,
                'role' => 'user'
            ],
            [
                'id' => 3,
                'role' => 'baa'
            ],
        ]);
        
    }
}
