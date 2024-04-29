<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldsOfPractice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldsOfPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldsOfPractice::factory()->count(1000)->create();
    }
}

