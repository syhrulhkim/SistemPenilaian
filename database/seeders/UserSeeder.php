<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Saiful',
            'email' => 'saiful@admin.com',
            'nostaff' => 'A999',
            'position' => 'Manager',
            'department' => 'COD',
            'unit' => 'Alpha',
            'grade' => 'A99',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);
    }
}
