<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pangkat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pangkats')->insert([
            [
                'pangkat' => 'III/b',
            ],            [
                'pangkat' => 'III/c',
            ],            [
                'pangkat' => 'III/d',
            ],            [
                'pangkat' => 'IV/a',
            ],            [
                'pangkat' => 'IV/b',
            ],            [
                'pangkat' => 'IV/c',
            ],            [
                'pangkat' => 'IV/d',
            ],            [
                'pangkat' => 'IV/e',
            ],
        ]);
    }
}
