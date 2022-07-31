<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(
            [
                'title' => 'Battlefield 4',
                'user_id' => '1',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'The witcher 3',
                'user_id' => '1',
                'game_url' => "https://www.thewitcher.com/es/witcher3"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Red dead redemption II',
                'user_id' => '1',
                'game_url' => "https://www.rockstargames.com/reddeadredemption2/"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Player unknown battleground',
                'user_id' => '1',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Mario kart',
                'user_id' => '1',
                'game_url' => "https://mariokarttour.com/es-ES"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Overwatch',
                'user_id' => '1',
                'game_url' => "https://playoverwatch.com/es-es/"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Mass effect 3',
                'user_id' => '1',
                'game_url' => "https://www.ea.com/es-es/games/mass-effect/mass-effect-3"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'World of warcraft',
                'user_id' => '1',
                'game_url' => "https://worldofwarcraft.com/es-es/start?utm_source=6372051&utm_medium=Paid&utm_content=336711132&utm_campaign=BLZ_27602898&dclid=CJvD6Ib4kfkCFQa0GwodZt8PLw"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Counter strike: Global',
                'user_id' => '1',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ]
        );
        DB::table('games')->insert(
            [
                'title' => 'Horizon zero dawn',
                'user_id' => '1',
                'game_url' => "https://www.playstation.com/es-es/games/horizon-zero-dawn/"
            ]
        );
        DB::table('games')->insert(
            [
                "title" => "World of tanks",
                'user_id' => '1',
                "game_url" => "https://worldoftanks.eu/es/"
            ]
        );
    }
}
