<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'summary' => $this->faker->paragraph,
            'body' => $this->faker->realText,
            'user_id' => User::factory(),
        ];
    }

    public function published(): Factory
    {
        return $this->state(function () {
            return [
                'published_at' => now(),
            ];
        });
    }

    public function featured(): Factory
    {
        return $this->state(function () {
            return [
                'featured_at' => now(),
            ];
        });
    }
}
