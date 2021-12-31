<?php

use App\Models\Role;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::new()->create([
            'email' => 'admin@lte.com',
            'full_name' => 'Admin',
            'mobile' => '9876543210',
            'mobile_alt' => '9874563210',
            'city' => 'Mathura',
            'state' => 'Uttar Pradesh',
            'pincode' => '281004',
            'address' => 'FN 201, Mapple Building, Hongkong',
            'role_id' => Role::whereName('admin')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'manager@lte.com',
            'full_name' => 'Manager',
            'role_id' => Role::whereName('manager')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'technicalhead@lte.com',
            'full_name' => 'Technical Head',
            'role_id' => Role::whereName('technical_head')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'executive@lte.com',
            'full_name' => 'Executive',
            'role_id' => Role::whereName('executive')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'writer@lte.com',
            'full_name' => 'Writer',
            'role_id' => Role::whereName('writer')->first(),
        ]);

        for ($i = 1; $i < 10; $i++) {
            UserFactory::new()->create([
                'role_id' => Role::whereName('writer')->first(),
            ]);
        }
    }
}
