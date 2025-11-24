<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    \App\Models\User::firstOrCreate(
    ['username' => 'admin'], // check by username
    [
        'name' => 'Admin',
        'email' => 'admin@readera.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
        'is_admin' => true,
    ]
);

}


}
