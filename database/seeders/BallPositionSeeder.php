<?php

namespace Database\Seeders;

use App\Models\BallPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BallPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BallPosition::create([
            'x' => 0.0,
            'y' => 0.0,
            'z' => 0.0
        ]);
    }
}
