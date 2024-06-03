<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Module;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'telegram_id' => '0000000',
            'nom' => 'BARA',
            'prenom' => 'Issa',
            'email' => 'bara@gmail.com',
            'ine' => 'INE123456',
            'telephone' => '+22663365637',
            'role' => 'etudiant',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'telegram_id' => '5416153193',
            'nom' => 'KABORE',
            'prenom' => 'Stephane',
            'email' => 'kabore@gmail.com',
            'ine' => 'M7456233',
            'telephone' => '+22674962102',
            'role' => 'enseignant',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'telegram_id' => '1455558555666',
            'nom' => 'SABIDANI',
            'prenom' => 'Elisee',
            'email' => 'sabidani@gmail.com',
            'ine' => 'M0025845',
            'telephone' => '+226720014856',
            'role' => 'enseignant',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'telegram_id' => '1111445552266544',
            'nom' => 'BIKIENGA',
            'prenom' => 'Moustafa',
            'email' => 'bikienga@gmail.com',
            'ine' => 'M9632541',
            'telephone' => '+2267896654',
            'role' => 'enseignant',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'telegram_id' => '3333333333',
            'nom' => 'BERE',
            'prenom' => 'Christophe',
            'email' => 'bere@gmail.com',
            'ine' => 'M0432541',
            'telephone' => '+22671966054',
            'role' => 'chefdepart',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'telegram_id' => '4444444444',
            'nom' => 'TOUGMA',
            'prenom' => 'Edmond',
            'email' => 'tougma@gmail.com',
            'ine' => 'N0256123456',
            'telephone' => '+22655258855',
            'role' => 'csaf',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       // User::factory()->count(10)->create();
    }
}
