<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Bogdan',
             'email' => 'bogdanvaskan450@gmail.com',
         ]);

        \App\Models\User::factory(300)->create();
        $users = \App\Models\User::all()->shuffle();
        for ($i = 0; $i < 19; $i++) {
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]);
        }

        $employers = \App\Models\Employer::all();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id,
            ]);
        }

        // \App\Models\User::factory(10)->create();


    }
}
