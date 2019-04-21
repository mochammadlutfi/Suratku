<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // this can be done as separate statements
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'kasubbag']);
        Role::create(['name' => 'sekretaris']);
        Role::create(['name' => 'kepala badan']);
        Role::create(['name' => 'kabid 1']);
        Role::create(['name' => 'kabid 2']);
        Role::create(['name' => 'kabid 3']);
        Role::create(['name' => 'kabid 4']);
        Role::create(['name' => 'kabid 5']);

    }
}
