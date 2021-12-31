<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Factories\TopicFactory;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'description' => $this->faker->sentence,
            'topic_id' => TopicFactory::new(),
        ];
    }
}
