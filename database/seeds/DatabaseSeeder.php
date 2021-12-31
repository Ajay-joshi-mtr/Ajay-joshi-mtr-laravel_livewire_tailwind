<?php

use Database\Seeders\TagTopicTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            return;
        }

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(TypeTableSeeder::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(TagTableSeeder::class);
        
        $this->call(TopicTableSeeder::class);
        $this->call(ChapterTableSeeder::class);
        
    }
}
