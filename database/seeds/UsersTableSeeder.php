<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = User::create([
    		'email' => 'admin@example.com',
    		'name' => 'Demo Admin',
    		'password' => bcrypt('password123')
    	]);

        $adminRole = Role::create(['name' => 'Admin']);
        $permissions = [
            ['name' => 'manage users'],
            ['name' => 'manage settings']
        ];
        foreach($permissions as $p)
        {
            $adminPermissions = Permission::create($p);
            $adminRole->givePermissionTo($adminPermissions);
        }
        $admin->assignRole($adminRole);

        // Let's create 10 users
        $userRole = Role::create(['name' => 'User']);
        for($i = 1; $i < 11; $i++)
        {
            $user = User::create([
                'email' => 'user'.$i.'@example.com',
                'name' => 'Demo User '.$i,
                'password' => bcrypt('password123')
            ]);
            $user->assignRole($userRole);
        }
    }
}
