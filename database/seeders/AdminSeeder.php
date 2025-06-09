<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Kitchen Admin',
            'email' => 'kitchen@sainteanne.com',
            'password' => Hash::make('kitchen123'),
        ]);
    }
}
