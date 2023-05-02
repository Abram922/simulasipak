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

        \App\Models\jabatan::create([
       
            'jabatan' => 'Asisten Ahli 100',
            'angkaKreditKumulatif' => 100 ,
            'pelaksanaanPendidikan' => 55 ,
            'pelaksanaanPenelitian' => 25 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
       
            'jabatan' => 'Asisten Ahli 150',
            'angkaKreditKumulatif' => 150 ,
            'pelaksanaanPendidikan' => 55 ,
            'pelaksanaanPenelitian' => 25 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
   
            'jabatan' => 'Lektor 200',
            'angkaKreditKumulatif' => 200 ,
            'pelaksanaanPendidikan' => 45 ,
            'pelaksanaanPenelitian' => 35 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
   
            'jabatan' => 'Lektor 300',
            'angkaKreditKumulatif' => 300 ,
            'pelaksanaanPendidikan' => 45 ,
            'pelaksanaanPenelitian' => 35 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
         
            'jabatan' => 'Lektor Kepala 400',
            'angkaKreditKumulatif' => 400 ,
            'pelaksanaanPendidikan' => 40 ,
            'pelaksanaanPenelitian' => 40 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
         
            'jabatan' => 'Lektor Kepala 550',
            'angkaKreditKumulatif' => 550 ,
            'pelaksanaanPendidikan' => 40 ,
            'pelaksanaanPenelitian' => 40 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([
         
            'jabatan' => 'Lektor Kepala 700',
            'angkaKreditKumulatif' => 700 ,
            'pelaksanaanPendidikan' => 40 ,
            'pelaksanaanPenelitian' => 40 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([

            'jabatan' => 'Professor 850',
            'angkaKreditKumulatif' => 850 ,
            'pelaksanaanPendidikan' => 35 ,
            'pelaksanaanPenelitian' => 45 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);

        \App\Models\jabatan::create([

            'jabatan' => 'Professor 1050',
            'angkaKreditKumulatif' => 1050 ,
            'pelaksanaanPendidikan' => 35 ,
            'pelaksanaanPenelitian' => 45 ,
            'pelaksanaanPengabdianMasyarakat' => 10 ,
            'penunjang'=> 10 
        ]);
    }
}
