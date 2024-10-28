<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()->count(5)->create();
    }
}
