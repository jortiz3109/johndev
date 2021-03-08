<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'avatar' => Storage::get('stubs/default-author-avatar.svg'),
            'about' => $this->faker->words(5, true),
            'user_id' => User::factory(),
        ];
    }
}
