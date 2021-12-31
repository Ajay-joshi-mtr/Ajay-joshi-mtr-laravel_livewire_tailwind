<?php

namespace Database\Factories;

use App\Models\TagTopic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagTopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagTopic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => TagFactory::new(),
            'topic_id' => TopicFactory::new(),
        ];
    }
}
