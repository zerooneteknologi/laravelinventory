<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Credit;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
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
        // User::factory(5)->create();
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'role' => 'owner',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => 'warehouse',
            'email' => 'warehouse@gmail.com',
            'email_verified_at' => now(),
            'role' => 'warehouse',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => 'marketing',
            'email' => 'marketing@gmail.com',
            'email_verified_at' => now(),
            'role' => 'marketing',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        Payment::create([
            'payment' => 'cash'
        ]);
        Payment::create([
            'payment' => 'tranfer'
        ]);
        Payment::create([
            'payment' => 'credit'
        ]);

        // Suplayer::factory(10)->create();

        // Product::factory(10)->create();

        // Customer::factory(5)->create();

        // Company::factory(1)->create();

        // Category::create([
        //     'categoriName' => 'pakaian'
        // ]);
        // Category::create([
        //     'categoriName' => 'makanan'
        // ]);
        // Category::create([
        //     'categoriName' => 'aksesoris'
        // ]);

        // Purchase::factory(5)->create();
        // Order::factory(10)->create();

        // Invoice::factory(5)->create();
        // Sale::factory(10)->create();

        // Credit::factory(5)->create();
    }
}
