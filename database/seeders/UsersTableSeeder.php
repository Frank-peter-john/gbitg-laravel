<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         // Create dummy users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

          User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Michael Smith',
            'email' => 'michael@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Emily Johnson',
            'email' => 'emily@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'William Brown',
            'email' => 'william@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Olivia Wilson',
            'email' => 'olivia@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'James Taylor',
            'email' => 'james@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Charlotte Jones',
            'email' => 'charlotte@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Noah Davis',
            'email' => 'noah@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Sophia Martinez',
            'email' => 'sophia@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}