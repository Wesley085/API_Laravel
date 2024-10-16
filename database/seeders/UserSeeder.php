<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'wesley@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Wesley',
                'email' => 'wesley@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        if (!User::where('email', 'maria@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Maria',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        if (!User::where('email', 'eduardo@gmail.com')->first()) {
            $superAdmin = User::create([
                'name' => 'Eduardo',
                'email' => 'eduardo@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
    }
}
