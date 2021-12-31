<?php

use App\Models\Role;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Roles Index Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'roles',
            'name' => 'roles.index',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        // Roles Create Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'roles',
            'name' => 'roles.create',
            'description' => 'Create',
        ]);

        // Roles Edit Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'roles',
            'name' => 'roles.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        // Roles Delete Permissions
        PermissionFactory::new()->create([
            'group' => 'roles',
            'name' => 'roles.delete',
            'description' => 'Delete',
        ]);


        // Users Index Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'users',
            'name' => 'users.index',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        // Users Create Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'users',
            'name' => 'users.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        // Users Edit Permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'users',
            'name' => 'users.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        // Users Delete Permissions
        PermissionFactory::new()->create([
            'group' => 'users',
            'name' => 'users.delete',
            'description' => 'Delete',
        ]);


        //  types permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'Research Areas',
            'name' => 'types.index',
            'description' => 'List',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Research Areas',
            'name' => 'types.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Research Areas',
            'name' => 'types.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Research Areas',
            'name' => 'types.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Research Areas',
            'name' => 'types.view',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

       
        //  specializations permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'Domains',
            'name' => 'specializations.index',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Domains',
            'name' => 'specializations.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Domains',
            'name' => 'specializations.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Domains',
            'name' => 'specializations.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        //  tags permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'Keywords',
            'name' => 'tags.index',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Keywords',
            'name' => 'tags.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Keywords',
            'name' => 'tags.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Keywords',
            'name' => 'tags.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        //  templates permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'Templates',
            'name' => 'templates.index',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Templates',
            'name' => 'templates.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Templates',
            'name' => 'templates.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'Templates',
            'name' => 'templates.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);



        //  topics permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'topics',
            'name' => 'topics.index',
            'description' => 'List',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'topics',
            'name' => 'topics.view',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')
        ->orWhere('name', 'executive')
        ->orWhere('name', 'writer')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'topics',
            'name' => 'topics.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);


        $permision = PermissionFactory::new()->create([
            'group' => 'topics',
            'name' => 'topics.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'topics',
            'name' => 'topics.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);




        //  Download requests permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'download_requests',
            'name' => 'chapterRequests.index',
            'description' => 'Send',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'download_requests',
            'name' => 'chapterRequests.approve',
            'description' => 'Approve',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'download_requests',
            'name' => 'chapterRequests.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);


        //  webhooks permissions
        $permision = PermissionFactory::new()->create([
            'group' => 'webhooks',
            'name' => 'webhooks.index',
            'description' => 'List',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'webhooks',
            'name' => 'webhooks.create',
            'description' => 'Create',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'webhooks',
            'name' => 'webhooks.edit',
            'description' => 'Edit',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'webhooks',
            'name' => 'webhooks.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);



        // new topic create requests
        $permision = PermissionFactory::new()->create([
            'group' => 'requests',
            'name' => 'requests.index',
            'description' => 'List',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'requests',
            'name' => 'requests.view',
            'description' => 'View',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'requests',
            'name' => 'requests.delete',
            'description' => 'Delete',
        ]);
        $roles = Role::where('name', 'manager')->get();
        $permision->roles()->attach($roles);



        // topics import / export
        // $permision = PermissionFactory::new()->create([
        //     'group' => 'import/export',
        //     'name' => 'topics.import',
        //     'description' => 'Import Topics',
        // ]);
        // $roles = Role::where('name', 'manager')
        // ->orWhere('name', 'technical_head')->get();
        // $permision->roles()->attach($roles);

        $permision = PermissionFactory::new()->create([
            'group' => 'import/export',
            'name' => 'topics.export',
            'description' => 'Topics',
        ]);
        $roles = Role::where('name', 'manager')
        ->orWhere('name', 'technical_head')->get();
        $permision->roles()->attach($roles);
    }
}
