<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('a'),
                'level' => 1
            ],

            [
                'name' => 'rigii',
                'email' => 'rigii@gmail.com',
                'password' => bcrypt('a'),
                'level' => 2
            ],

            [
                'name' => 'nadila',
                'email' => 'nadila@gmail.com',
                'password' => bcrypt('a'),
                'level' => 2
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
