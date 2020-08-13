<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Timothy Cabasal',
            'email'         => 'admin@gmail.com',
            'user_role'     =>  1,
            'branch_id'     =>  1,
            'password'      => Hash::make('password')
        ]);

        User::create([
            'name'          => 'El Don Lee',
            'email'         => 'inventory@gmail.com',
            'user_role'     =>  2,
            'branch_id'     =>  2,
            'password'      => Hash::make('password')
        ]);
    }
}