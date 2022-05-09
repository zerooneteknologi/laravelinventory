<?php

namespace Database\Seeders;

use App\Models\Suplayer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        User::create([
            'name' => 'sasanurjaman',
            'email' => 'nurjamansasa97@gmail.com',
            'email_verified_at' => now(),
            'role' => 'owner',
            'password' => Hash::make('sathista'),
            'remember_token' => Str::random(10)
        ]);

        Suplayer::factory(10)->create();
    }
}