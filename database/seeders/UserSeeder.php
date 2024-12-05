<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'developer',
            // 'email' => Str::random(10).'@emiprocessing.com',
            'email'=>'developer@emiprocessing.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Test@Password123#'),
        ]);

    }
}
