<?php

namespace Database\Seeders;

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
        //predefined, for testing
        $this->call(UserTableSeeder::class); 
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        
        //factory relationships
        \App\Models\User::factory(3)
        ->has(\App\Models\Post::factory()->count(2)
        ->has(\App\Models\Comment::factory()->count(1)))
        ->create();


    }
}
