<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@ehb.be',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Password!321'),
            'isAdmin' => true,
        ]);
    }                       
}
