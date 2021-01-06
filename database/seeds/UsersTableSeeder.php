<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name' => 'Mohamed Zajith', 'email' => 'mohamedzajith@gmail.com', 'password' => Hash::make('qwerty')],
        ];
        \App\Models\User::truncate();
        \App\Models\User::insert($user);
    }
}
