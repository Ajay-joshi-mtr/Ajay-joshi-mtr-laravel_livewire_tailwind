<?php

namespace Database\Factories;

use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class SpecializationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specialization::class;

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
            'type_id' =>TypeFactory::new(),
        ];
    }
}
