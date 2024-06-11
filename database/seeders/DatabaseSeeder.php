<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Okan Durmus',
            'email' => 'reed53@example.net',
        ]);
       \App\Models\User::factory(100)->create();

        $users = \App\Models\User::all()->shuffle();

        for($i = 0; $i < 20; $i++){
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }
         
        $employers = \App\Models\Employer::all();

        for($i = 0; $i < 30; $i++){
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

    }
}
