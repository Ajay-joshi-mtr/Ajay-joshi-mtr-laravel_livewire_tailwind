<?php

use Illuminate\Database\Seeder;
use Database\Factories\TypeFactory;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TypeFactory::new()->create([
            'title' => 'Computer Science',
        ]);

        TypeFactory::new()->create([
            'title' => 'Civil',
        ]);

        TypeFactory::new()->create([
            'title' => 'Management',
        ]);
    }
}
