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
        $p1->extract = "dsfegdgdsgdfgdsfgdfsgdsfgdsfgsd";
        $p1->body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien urna, volutpat ut mauris vitae, blandit tempus ante. Nam et gravida metus. Maecenas semper feugiat ex. Cras et neque laoreet, consequat justo sed, tempus nisl. Praesent ut erat turpis. Vivamus pretium ante lacus. Etiam ac orci id lacus fermentum elementum. Donec sagittis faucibus odio, id fermentum mi condimentum id. Pellentesque ut diam at tortor sollicitudin tempus. Duis ullamcorper euismod risus et sodales. Curabitur semper elit quis ornare hendrerit. Pellentesque velit turpis, pharetra et fringilla vulputate, consectetur nec sem.

        Vestibulum augue leo, molestie nec dolor non, vehicula eleifend ligula. Suspendisse a auctor dolor, vitae tincidunt nibh. Pellentesque in tincidunt lacus, id efficitur odio. Fusce sit amet fringilla magna. Proin volutpat consequat diam, sollicitudin ornare ante fringilla et. Cras interdum, tortor sed lobortis consequat, tortor lorem ultrices augue, facilisis molestie sapien lectus sit amet eros. Sed convallis diam a faucibus mollis.
        
        Phasellus eu semper tellus, dapibus tempus arcu. Sed sapien dui, blandit suscipit sapien ultrices, fringilla porta ligula. Sed lacus metus, euismod maximus urna ut, commodo rutrum risus. Aenean a finibus mauris. Vestibulum placerat felis nisi, id ultricies neque varius nec. Donec tincidunt odio vitae dui fringilla, sit amet vestibulum justo egestas. Vivamus tempor orci vitae varius dictum. Aliquam malesuada dui vel nulla rhoncus, vitae tristique ligula maximus. Donec turpis mauris, semper quis blandit eget, malesuada vestibulum sapien. In finibus, justo et tincidunt maximus, velit erat convallis dui, sed consequat elit lorem nec velit.
        
        Pellentesque sagittis a ex sit amet condimentum. Sed vel dolor lacinia, convallis dolor nec, tincidunt mi. Fusce quis tincidunt velit. Vestibulum eu diam ligula. Aenean in mauris vitae est porttitor pulvinar ac in nunc. Proin congue pulvinar fringilla. Quisque odio sapien, lobortis in orci et, consequat molestie mi. Duis porttitor vel augue nec tempus. Proin dapibus sapien turpis, at consectetur ipsum interdum pellentesque. Donec ornare mattis risus ac suscipit. Sed posuere velit vitae orci dignissim gravida. Nunc a sollicitudin turpis. Maecenas vulputate nulla orci, sit amet facilisis urna vehicula id. Nunc commodo felis eros, vel eleifend urna consectetur eget.";
        $p1->save();
        
        $posts = Post::factory()->count(12)->create();
        }

        
}
