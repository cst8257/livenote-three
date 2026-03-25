<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        Tag::create(['name' => 'Personal']);
        Tag::create(['name' => 'Work']);
        Tag::create(['name' => 'Shopping']);
        Tag::create(['name' => 'Fitness']);

        DB::table('note_tag')->insert([
            ['note_id' => 1, 'tag_id' => 2],
            ['note_id' => 2, 'tag_id' => 1],
            ['note_id' => 2, 'tag_id' => 3],
            ['note_id' => 3, 'tag_id' => 1],
            ['note_id' => 3, 'tag_id' => 4],
            ['note_id' => 4, 'tag_id' => 1],
            ['note_id' => 5, 'tag_id' => 2],
            ['note_id' => 6, 'tag_id' => 1],
        ]);
    }
}
