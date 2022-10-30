<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $tags = Tag::all();

       Post::all()->each(function ($post) use ($tags) {
        $post->tags()->attach(
            $tags->random(rand(1,5))->pluck('id')->toArray()
        );
       });

       \App\Models\User::Factory(5)->create();
    }

    
}
