<?php

namespace Database\Seeders;

use Database\Factories\TagTopicFactory;
use Illuminate\Database\Seeder;

class TagTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10; $i++)
        {
            TagTopicFactory::new()->create([
                'tag_id' => mt_rand(1,5),
                'topic_id' => mt_rand(1,5),
            ]);
        }
    }
}
