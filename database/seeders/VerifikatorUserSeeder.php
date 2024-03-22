<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerifikatorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Verifikator',
            'email' => 'verifikator@mail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('verifikator');
    }
}
