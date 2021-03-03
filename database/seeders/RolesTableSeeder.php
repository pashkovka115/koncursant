<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role_admin = new Role();
        $role_admin->role_name = 'Admin';
        $role_admin->role_desc = 'A Admin';
        $role_admin->save();

        $role_user = new Role();
        $role_user->role_name = 'User';
        $role_user->role_desc = 'A normal User';
        $role_user->save();
    }
}
