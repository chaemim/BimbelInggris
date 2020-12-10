<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = "Administrator";
        $user->email = "nibici@gmail.com";
        $user->role_id = "1";
        $user->ttl = "1997-11-23"
        $user->password = Hash::make('admin');
        $user->phone = "083839438046";
        $user->address = "Jl Raya Jatiwaringin No. 101";
        $user->save();

    }
}
