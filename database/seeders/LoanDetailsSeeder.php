<?php

namespace Database\Seeders;

use App\Models\LoanDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoanDetails::factory()->count(3)->create();        

    }
}
