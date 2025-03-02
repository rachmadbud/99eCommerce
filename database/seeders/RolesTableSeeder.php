<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=RolesTableSeeder
     */
    public function run(): void
    {
        Role::create([
            'name' => 'administrator'
        ]);

        Role::create([
            'name' => 'verifikator'
        ]);

        Role::create([
            'name' => 'user'
        ]);
    }
}
