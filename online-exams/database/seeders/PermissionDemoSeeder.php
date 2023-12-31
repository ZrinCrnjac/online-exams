<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder{
    /**
     * Create initial roles and permissions
     * 
     * @return void
     */
    public function run(){
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create subjects']);
        Permission::create(['name' => 'read subjects']);
        Permission::create(['name' => 'update subjects']);
        Permission::create(['name' => 'delete subjects']);

        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'read tasks']);
        Permission::create(['name' => 'update tasks']);
        Permission::create(['name' => 'delete tasks']);

        Permission::create(['name' => 'create exams']);
        Permission::create(['name' => 'read exams']);
        Permission::create(['name' => 'update exams']);
        Permission::create(['name' => 'delete exams']);

        Permission::create(['name' => 'add roles']);

        // create roles and assign created permissions
        $role1 = Role::create(['name' => 'admin']); // gets everything

        $role2 = Role::create(['name' => 'professor']);
        $role2->givePermissionTo('create subjects');
        $role2->givePermissionTo('read subjects');
        $role2->givePermissionTo('update subjects');
        $role2->givePermissionTo('delete subjects');
        $role2->givePermissionTo('create exams');
        $role2->givePermissionTo('read exams');
        $role2->givePermissionTo('update exams');
        $role2->givePermissionTo('delete exams');
        $role2->givePermissionTo('create tasks');
        $role2->givePermissionTo('read tasks');
        $role2->givePermissionTo('update tasks');
        $role2->givePermissionTo('delete tasks');

        $role3 = Role::create(['name' => 'student']);
        $role3->givePermissionTo('read subjects');
        $role3->givePermissionTo('read tasks');
        $role3->givePermissionTo('read exams');
        $role3->givePermissionTo('create exams');
        $role3->givePermissionTo('update exams');

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Professor User',
            'email' => 'professor@professor.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Student User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($role3);
        
    }
}

?>