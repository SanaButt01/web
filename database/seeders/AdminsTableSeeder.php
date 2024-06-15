<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Model\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        $password = Hash::make('password');

        $admins = array(
            array(
               
                'email' => 'admin@gmail.com',
                'password' => $password
            ),
        );
        foreach($admins as $admin)
        {
            Admin::create($admin);
        }
    }
}
