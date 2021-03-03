<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('role_name', 'Admin')->first();
        $role_user = Role::where('role_name', 'User')->first();


        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
