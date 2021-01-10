<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'application.create',
            'application.authorize',
        ];
        foreach($permissions as $permission) Permission::create(['name' => $permission]);
        // =======================================================================
        
        $admin       = Role::create(['name' => 'admin']);
        $payroll     = Role::create(['name' => 'payroll']);
        $lineManager = Role::create(['name' => 'line manager']);
        $executive   = Role::create(['name' => 'executive']);
        // =======================================================================

        $executive_permissions = [
            'application.create',
        ];
        
        $admin->syncPermissions($permissions);
        $lineManager->syncPermissions($permissions);
        $executive->syncPermissions($executive_permissions);
    }
}
