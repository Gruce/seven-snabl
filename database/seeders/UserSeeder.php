<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User;
        // $user->name = 'Admin';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('123456');
        // $user->is_admin = true;
        // $user->save();


        // $user = new User;
        // $user->name = 'User';
        // $user->email = 'user@gmail.com';
        // $user->password = bcrypt('123456');
        // $user->save();

        $user = new User;
        $user->add([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'phonenumber' => '09123456789',
        ]);

        $user = new User;
        $user->add([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'phonenumber' => '123456789',
        ]);
    }
}
