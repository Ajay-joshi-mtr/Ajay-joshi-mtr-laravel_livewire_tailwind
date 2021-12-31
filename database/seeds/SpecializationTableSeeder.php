<?php

use Illuminate\Database\Seeder;
use Database\Factories\SpecializationFactory;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpecializationFactory::new()->create([
            'title' => 'Image Processing',
            'type_id' => 1,
        ]);

        SpecializationFactory::new()->create([
            'title' => 'Data Mining',
            'type_id' => 1,
        ]);

        SpecializationFactory::new()->create([
            'title' => 'Over Bridge',
            'type_id' => 2,
        ]);

        SpecializationFactory::new()->create([
            'title' => 'Express Way',
            'type_id' => 2,
        ]);

        SpecializationFactory::new()->create([
            'title' => 'Leadership',
            'type_id' => 3,
        ]);

        SpecializationFactory::new()->create([
            'title' => 'Human Resources',
            'type_id' => 3,
        ]);
    }
}
