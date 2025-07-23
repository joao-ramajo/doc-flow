<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'business_id' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@gmail.com',
                'role' => 'employee',
                'business_id' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('123456')
            ],
        ];
        $clients = [
            'business_id' => 1,
            'name' => 'Client 1',
            'email' => 'client_1@gmail.com',
            'cpf' => '52117712819',
            'rg' => '554102780X',
            'phone' => '11946289761'
        ];

        $business = [
            'name' => 'Synic CO'
        ];

        DB::table('businesses')->insert($business);
        DB::table('users')->insert($users);
        DB::table('clients')->insert($clients);
    }
}
