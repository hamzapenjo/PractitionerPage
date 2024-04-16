<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Practice;
use App\Models\FieldsOfPractice;

class PracticeFieldsOfPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationsPerPractice = 1;
    
        $practiceIds = Practice::pluck('id');
        $fieldsOfPracticeIds = FieldsOfPractice::pluck('id');
    
        $practiceIds->each(function ($practiceId) use ($fieldsOfPracticeIds, $relationsPerPractice) {
            $fieldsToAttach = $fieldsOfPracticeIds->random($relationsPerPractice);
            Practice::find($practiceId)->fieldsOfPractice()->attach($fieldsToAttach);
        });
    }
}




