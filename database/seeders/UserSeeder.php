<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Practice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $practitioners = User::factory()->count(10)->create([
            'type' => 1,
        ]);
        
        $users = User::factory()
            ->count(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'practitioner_id' => User::select('id')->inRandomOrder()->first()->id,
                    'practice_id' => Practice::select('id')->inRandomOrder()->first()->id
                ],
            ))
            ->create([
                'type' => 2,
            ]);

    }
}
