<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => "Toghrul",
                'surname' => "Jafar",
                'email' => "togrul@codio.az",
                'password' => Hash::make("12345678"),
                'age' => 21,
                'image' => 'img.png',
            ],
            [
                'name' => "Yalchin",
                'surname' => "Aliyev",
                'email' => "yalcin@codio.az",
                'password' => Hash::make("12345678"),
                'age' => 21,
                'image' => 'img.png',
            ],
            [
                'name' => "Fuad",
                'surname' => "Pashayev",
                'email' => "fuad@codio.az",
                'password' => Hash::make("12345678"),
                'age' => 21,
                'image' => 'img.png',
            ],
            [
                'name' => "Rauf",
                'surname' => "Abbas",
                'email' => "rauf@codio.az",
                'password' => Hash::make("12345678"),
                'age' => 21,
                'image' => 'img.png',
            ],
        ];

        foreach ($array as $item) {
            User::create($item);
        }
    }
}
