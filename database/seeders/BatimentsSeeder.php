<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BatimentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('batiments')->insert([
            'nom' => 'WEND-PANGA',
            'image' => 'C:\Users\Christophe\Desktop\logo_unz.jpg', // chemin de l'image facultatif
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('batiments')->insert([
            'nom' => 'AMPHI 1000',
            'image' => 'C:\Users\Christophe\Desktop\logo_unz.jpg', // chemin de l'image facultatif
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('batiments')->insert([
            'nom' => 'AMPHI 750',
            'image' => 'C:\Users\Christophe\Desktop\logo_unz.jpg', // chemin de l'image facultatif
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('batiments')->insert([
            'nom' => 'AMPHI 500',
            'image' => 'C:\Users\Christophe\Desktop\logo_unz.jpg', // chemin de l'image facultatif
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('batiments')->insert([
            'nom' => 'AMPHI TOGOYENI',
            'image' => 'C:\Users\Christophe\Desktop\logo_unz.jpg', // chemin de l'image facultatif
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
