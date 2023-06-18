<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SKTM;

class SKTMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SKTM::factory(10)->create();
    }
}
