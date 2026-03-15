<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Note::create(['title' => 'Meeting Notes', 'content' => 'Discuss project milestones and deadlines.']);
        Note::create(['title' => 'Shopping List', 'content' => 'Buy milk, eggs, bread, and coffee.']);
        Note::create(['title' => 'Workout Plan', 'content' => 'Monday: Cardio, Tuesday: Strength training.']);
        Note::create(['title' => 'Recipe Ideas', 'content' => 'Try making lasagna and chocolate cake.']);
        Note::create(['title' => 'Travel Itinerary', 'content' => 'Visit Paris, Rome, and Barcelona.']);
        Note::create(['title' => 'Book Recommendations', 'content' => 'Read "1984" by George Orwell and "Dune" by Frank Herbert.']);
        
        Note::factory(10)->create();
    }
}
