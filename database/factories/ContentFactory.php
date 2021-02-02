<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    protected $model = Content::class;

    public function definition()
    {
        $sentence = $this->faker->sentence();

        return [
            'title' => $sentence,
            'body' => $this->faker->text(),
            'excerpt' => $sentence,
            'user_id' => $this->faker->randomElement([1, 2, 3]),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
