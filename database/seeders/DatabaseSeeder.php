<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\jabatan::create([
       
            'jabatan' => 'Asisten Ahli',
            'angkaKreditKumulatif' => 200 ,
            'pelaksanaanPendidikan' => 55 ,
            'pelaksanaanPenelitian' => 25 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
   
            'jabatan' => 'Lektor',
            'angkaKreditKumulatif' => 300 ,
            'pelaksanaanPendidikan' => 45 ,
            'pelaksanaanPenelitian' => 35 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
         
            'jabatan' => 'Lektor Kepala',
            'angkaKreditKumulatif' => 400 ,
            'pelaksanaanPendidikan' => 40 ,
            'pelaksanaanPenelitian' => 40 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);


        \App\Models\jabatan::create([

            'jabatan' => 'Professor',
            'angkaKreditKumulatif' => 700 ,
            'pelaksanaanPendidikan' => 35 ,
            'pelaksanaanPenelitian' => 45 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);
    }
}
