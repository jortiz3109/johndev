<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'summary' => Str::substr($this->faker->paragraph, 0, 80),
            'body' => $this->body(),
            'user_id' => User::factory(),
        ];
    }

    private function body(): string
    {
        $body = '';
        $paragraphs = $this->faker->paragraphs(random_int(5, 50));
        foreach ($paragraphs as $paragraph) {
            $body .= "<p>{$paragraph}</p>";
        }

        return $body;
    }
}
