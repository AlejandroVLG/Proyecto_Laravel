<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            DB::table('users')->insert(
                [
                    'name' => 'Alejandro',
                    'steam_name' => "Alejandrogamer",
                    'email' => "Alejandro@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Sergio',
                    'steam_name' => "Sergio-gamer",
                    'email' => "Sergio@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Antonio',
                    'steam_name' => "Antonio-gamer",
                    'email' => "Antonio@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Oscar',
                    'steam_name' => "Oscar-gamer",
                    'email' => "Oscar@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Dani',
                    'steam_name' => "Dani-gamer",
                    'email' => "Dani@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Claudia',
                    'steam_name' => "Claudia-gamer",
                    'email' => "Claudia@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Jose',
                    'steam_name' => "Jose-gamer",
                    'email' => "Jose@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Jackson',
                    'steam_name' => "Jackson-gamer",
                    'email' => "Jackson@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'Juan',
                    'steam_name' => "Juan-gamer",
                    'email' => "Juan@gmail.com",
                    'password' => "123456"
                ],
                [
                    'name' => 'David',
                    'steam_name' => "David-gamer",
                    'email' => "David@gmail.com",
                    'password' => "123456"
                ]
            );
        }
    }
}
