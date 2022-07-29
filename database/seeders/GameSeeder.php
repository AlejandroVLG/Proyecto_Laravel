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
        DB::table('users')->insert(
            [
                'title' => 'Battlefield 4',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ],
            [
                'title' => 'The witcher 3',
                'game_url' => "https://www.thewitcher.com/es/witcher3"
            ],
            [
                'title' => 'Red dead redemption II',
                'game_url' => "https://www.rockstargames.com/reddeadredemption2/"
            ],
            [
                'title' => 'Player unknown battleground',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ],
            [
                'title' => 'Mario kart',
                'game_url' => "https://mariokarttour.com/es-ES"
            ],
            [
                'title' => 'Overwatch',
                'game_url' => "https://playoverwatch.com/es-es/"
            ],
            [
                'title' => 'Mass effect 3',
                'game_url' => "https://www.ea.com/es-es/games/mass-effect/mass-effect-3"
            ],
            [
                'title' => 'World of warcraft',
                'game_url' => "https://worldofwarcraft.com/es-es/start?utm_source=6372051&utm_medium=Paid&utm_content=336711132&utm_campaign=BLZ_27602898&dclid=CJvD6Ib4kfkCFQa0GwodZt8PLw"
            ],
            [
                'title' => 'Counter strike: Global',
                'game_url' => "https://www.ea.com/es-es/games/battlefield/battlefield-4"
            ],
            [
                'title' => 'Horizon zero dawn',
                'game_url' => "https://www.playstation.com/es-es/games/horizon-zero-dawn/"
            ]
        );
    }
}
