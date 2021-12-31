<?php


use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TagFactory::new()->create([
            'title' => 'AI',
        ]);

        TagFactory::new()->create([
            'title' => 'Essay',
        ]);

        TagFactory::new()->create([
            'title' => 'Dessertation',
        ]);

        TagFactory::new()->create([
            'title' => 'Disease',
        ]);

        TagFactory::new()->create([
            'title' => 'Plagiarisms',
        ]);
    }
}
