<?php

use Illuminate\Database\Seeder;
use Database\Factories\TopicFactory;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = array("en", "sk", "hi");

        TopicFactory::new()->create([
            'title' => 'BRAIN DEVELOPMENT',
            'description' => 'One of the main reasons is how fast the brain grows starting before birth and continuing into early childhood. Although the brain continues to develop and change into adulthood, the first 8 years can build a foundation for future learning, health and life success.',
            'short_description' => 'One of the main reasons is how fast the brain grows starting before birth and continuing into early childhood. Although the brain continues to develop and change into adulthood, the first 8 years can build a foundation for future learning, health and life success.',
            'language' => $languages[array_rand($languages)],
            'type_id' => 1,
            'specialization_id' => 1,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);

        TopicFactory::new()->create([
            'title' => 'MENTAL HEALTH',
            'description' => 'Mental health includes our emotional, psychological, and social well-being. It affects how we think, feel, and act. It also helps determine how we handle stress, relate to others, and make choices. Mental health is important at every stage of life, from childhood and adolescence through adulthood.',
            'short_description' => 'Mental health includes our emotional, psychological, and social well-being. It affects how we think, feel, and act. It also helps determine how we handle stress, relate to others, and make choices. Mental health is important at every stage of life, from childhood and adolescence through adulthood.',
            'language' => $languages[array_rand($languages)],
            'type_id' => 1,
            'specialization_id' => 2,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);

        TopicFactory::new()->create([
            'title' => 'AUTOMATIC SOLAR TRACKER',
            'description' => 'Solar tracker, a system that positions an object at an angle relative to the Sun. ... By keeping the panel perpendicular to the Sun, more sunlight strikes the solar panel, less light is reflected, and more energy is absorbed. That energy can be converted into power.',
            'short_description' => 'Solar tracker, a system that positions an object at an angle relative to the Sun. ... By keeping the panel perpendicular to the Sun, more sunlight strikes the solar panel, less light is reflected, and more energy is absorbed. That energy can be converted into power.',
            'language' => $languages[array_rand($languages)],
            'type_id' => 2,
            'specialization_id' => 3,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);

        TopicFactory::new()->create([
            'title' => 'CANCER',
            'description' => 'When cells grow old or become damaged, they die, and new cells take their place. Sometimes this orderly process breaks down, and abnormal or damaged cells grow and multiply when they shouldnt. These cells may form tumors, which are lumps of tissue.',
            'short_description' => 'When cells grow old or become damaged, they die, and new cells take their place. Sometimes this orderly process breaks down, and abnormal or damaged cells grow and multiply when they shouldnt. These cells may form tumors, which are lumps of tissue. ',
            'language' => $languages[array_rand($languages)],
            'type_id' => 2,
            'specialization_id' => 4,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);

        TopicFactory::new()->create([
            'title' => 'FACE DETECTION',
            'description' => 'Face detection -- also called facial detection -- is an artificial intelligence (AI) based computer technology used to find and identify human faces in digital images. ... It now plays an important role as the first step in many key applications -- including face tracking, face analysis and facial recognition.',
            'short_description' => 'Face detection -- also called facial detection -- is an artificial intelligence (AI) based computer technology used to find and identify human faces in digital images. ... It now plays an important role as the first step in many key applications -- including face tracking, face analysis and facial recognition.',
            'language' => $languages[array_rand($languages)],
            'type_id' => 3,
            'specialization_id' => 5,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);

        TopicFactory::new()->create([
            'title' => 'How To Manage',
            'description' => 'Face detection -- also called facial detection -- is an artificial intelligence (AI) based computer technology used to find and identify human faces in digital images. ... It now plays an important role as the first step in many key applications -- including face tracking, face analysis and facial recognition.',
            'short_description' => 'Face detection -- also called facial detection -- is an artificial intelligence (AI) based computer technology used to find and identify human faces in digital images. ... It now plays an important role as the first step in many key applications -- including face tracking, face analysis and facial recognition.',
            'language' => $languages[array_rand($languages)],
            'type_id' => 3,
            'specialization_id' => 6,
            'featured_image' => '/uploads/media/ajpg_1631016704.jpeg',
        ]);
    }
}
