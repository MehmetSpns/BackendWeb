<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@ehb.be',
        ], [
            'name' => 'Admin',
            'username' => 'Admin',
            'password' => Hash::make('Password!321'),
            'isAdmin' => true,
        ]);
    }                       
}
