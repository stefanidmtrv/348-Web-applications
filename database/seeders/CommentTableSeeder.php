<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1= new Comment;
        $c1->text = "Comment 1";
        $c1->post_id = 1;
        $c1->save();
    }
}
