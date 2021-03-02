<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $bodyHtml = '';
        foreach($this->faker->paragraphs(random_int(5, 50)) as $paragraph) {
            $bodyHtml .= "<p>{$paragraph}</p>";
        }

        return [
            'title' => $this->faker->unique()->words(3, true),
            'slug' => $this->faker->slug,
            'summary' => $this->faker->words(5, true),
            'body' => $bodyHtml,
            'user_id' => User::factory(),
        ];
    }
}
