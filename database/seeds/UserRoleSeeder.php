<?php

use Illuminate\Database\Seeder;
use App\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'user_role'          => 'Admin',
        ]);
        UserRole::create([
            'user_role'          => 'Unassigned',
        ]);
        UserRole::create([
            'user_role'          => 'Sales',
        ]);
        UserRole::create([
            'user_role'          => 'Encoder',
        ]);
    }
}
