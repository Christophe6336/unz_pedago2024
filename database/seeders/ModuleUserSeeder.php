<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModuleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::find(3);
        if ($user1) {
            $user1->modules()->sync([1]); // Modules à attacher à l'utilisateur 1
        }

        // Utilisateur 2
        $user2 = User::find(2);
        if ($user2) {
            $user2->modules()->sync([3]); // Modules à attacher à l'utilisateur 2
        }
}
}
