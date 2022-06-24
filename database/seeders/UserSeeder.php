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

        $user = new User;
        $user->add([
            'name' => 'مشرف',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'is_admin' => 1,
            'phonenumber' => '09123456789',
        ]);

        $user = new User;
        $user->add([
            'name' => 'مخول',
            'email' => 'user@gmail.com',
            'password' => '123456',
            'is_admin' => 2,
            'phonenumber' => '123456789',
        ]);
    }
}
