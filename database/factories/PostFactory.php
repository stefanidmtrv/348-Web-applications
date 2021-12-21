<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$filePath = storage_path('app/public/images');
        return [
            'user_id' => $this->faker->randomDigitNotNull(),
            'category_id' => $this->faker->randomDigitNotNull(),
            //'image' => 'https://www.kindpng.com/picc/m/42-427622_cat-png-transparent-png.png',
            'title' => $this->faker->sentence(),
            'extract' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'body' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
        ];
    }
}
