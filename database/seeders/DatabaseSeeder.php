<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        

        Role::create([
            'role_name' => 'pelanggan',
        ]);

        Role::create([
            'role_name' => 'admin',
        ]);

        User::create([
            'name' => 'Azka',
            'alamat' => 'Jatimas',
            'no_telp' => '088988023724',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 2
        ]);

        User::factory(5)->create();
    }
}
