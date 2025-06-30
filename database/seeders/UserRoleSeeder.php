<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find user by email
        $user = User::where('email', 'admin@gmail.com')->first();

        if (!$user) {
            $this->command->error('Admin user not found.');
            return;
        }

        // Fetch all permissions
        $permissions = Permission::all();

        // Create or fetch existing role
        $role = Role::firstOrCreate(['slug' => 'superAdmin']);

        // Attach all permissions to the role
        if (method_exists($role, 'refreshPermissions')) {
            $role->refreshPermissions($permissions->pluck('id')->toArray());
        } else {
            $role->permissions()->syncWithoutDetaching($permissions->pluck('id')->toArray());
        }

        // Attach role to user (if not already attached)
        $user->roles()->syncWithoutDetaching([$role->id]);
    }
}
