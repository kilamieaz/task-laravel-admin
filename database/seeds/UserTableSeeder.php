<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_buyer = Role::where('name', 'buyer')->first();
        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);
        $buyer = new User();
        $buyer->name = 'buyer 1';
        $buyer->email = 'buyer@example.com';
        $buyer->password = bcrypt('password');
        $buyer->save();
        $buyer->roles()->attach($role_buyer);
    }
}
