<?php

namespace Database\Seeders;


use App\Models\Practice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
    {
        Practice::factory()->count(10)->create();
    }
}


