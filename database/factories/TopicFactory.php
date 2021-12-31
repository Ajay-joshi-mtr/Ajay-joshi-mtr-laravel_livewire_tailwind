<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Factories\TypeFactory;
use Database\Factories\SpecializationFactory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(20),
            'description' => $this->faker->sentence(50),
            'short_description' => $this->faker->sentence(20),
            'language' => 'en',
            'type_id' => TypeFactory::new(),
            'specialization_id' => SpecializationFactory::new(),

        ];
    }
}
