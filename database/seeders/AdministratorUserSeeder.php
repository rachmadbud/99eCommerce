<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=AdministratorUserSeeder
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => '    ',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('administrator');
    }
}
