<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(100)->create()->each(function($user) {
            
            Profile::factory(1)->create([
                'user_id' => $user->id,
            ])->each(function($profile) {
                
                Address::factory(1)->create([
                    'profile_id' => $profile->id,
                ]);
            });
        });

        Category::factory(10)->create();
        Post::factory(50)->create();

        Course::factory(10)->create()->each(function($course) {

            Section::factory(4)->create([
                'course_id' => $course->id,

            ])->each(function($section) {
                Lesson::factory(5)->create([
                    'section_id' => $section->id,
                ]);
            });

        });

        // Crear las etiquetas de tag
        Tag::factory(10)->create();
    }
}
