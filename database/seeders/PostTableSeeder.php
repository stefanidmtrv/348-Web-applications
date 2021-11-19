<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new Post;
        $p1->user_id = 1;
        $p1->category_id = 1 ;
        $p1->title = "Post 1";
        $p1->body = "Post 1 body.";
        $p1->save();
        }
}
