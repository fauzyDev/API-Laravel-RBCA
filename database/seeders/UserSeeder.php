<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
              'name' => 'Admin User',
              'email' => 'admin@example.com',
              'password' => Hash::make('admin'),
              'role' => 'admin',
            ],
            [
              'name' => 'Editor User',
              'email' => 'editor@example.com',
              'password' => Hash::make('editor'),
              'role' => 'editor',
            ],
            [
              'name' => 'Viewer User',
              'email' => 'viewer@example.com',
              'password' => Hash::make('viewer'),
              'role' => 'viewer',
            ],
          ]);
    }
}
