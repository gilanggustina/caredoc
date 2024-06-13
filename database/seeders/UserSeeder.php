<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'edit administrator']);
        Permission::create(['name' => 'delete administrator']);
        Permission::create(['name' => 'add administrator']);

        Permission::create(['name' => 'edit illness']);
        Permission::create(['name' => 'delete illness']);
        Permission::create(['name' => 'add illness']);

        Permission::create(['name' => 'delete empty illness']);

        $role = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        $admin = User::create([
            'name' => 'Admin Caredoc',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $admin->assignRole($role);
    }
}
