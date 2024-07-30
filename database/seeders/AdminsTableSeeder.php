<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
    public function run()
    {
        $password = Hash::make('password');

        $admins = array(
            array(
                'name' => 'BooksCity',
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
