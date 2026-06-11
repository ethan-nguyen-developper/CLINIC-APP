<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $demoUser = User::create([
            'name'              => 'Pierre Namet',
            'email'             => 'pierre@eno-events.fr',
            'password'          => Hash::make('StockPierre'),
            'email_verified_at' => now(),
        ]);

        $demoUser = User::create([
            'name'              => 'Guillaume Singier',
            'email'             => 'guillaume.singier@gmail.com',
            'password'          => Hash::make('Guill0me'),
            'email_verified_at' => now(),
        ]);
        
        $demoUser = User::create([
            'name'              => $faker->name,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);

        $demoUser2 = User::create([
            'name'              => $faker->name,
            'email'             => 'admin@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);
    }
}
