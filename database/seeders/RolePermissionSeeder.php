<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create or fetch the "Super Admin" role
        $role = Role::firstOrCreate(
            ['slug' => 'super-admin']
        );

        if (!$role) {
            $this->command->error('Failed to create or find the Super Admin role.');
            return;
        }

        // Get all permission IDs
        $permissionIds = Permission::pluck('id')->toArray();

        if (method_exists($role, 'givePermissionTo')) {
            // Assign permissions using your method if defined
            $role->permissions()->syncWithoutDetaching($permissionIds);
        } elseif (method_exists($role, 'permissions')) {
            // Attach permissions using relationship
            $role->permissions()->syncWithoutDetaching($permissionIds);
        } else {
            $this->command->error('Role model does not support permission assignment.');
        }
    }
}
