<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KarateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karate_types')->insert([
            ['id' => 1, 'type' => 'Shotokan-ryu'],
            ['id' => 2, 'type' => 'Shito-ryu'],
            ['id' => 3, 'type' => 'Goju-ryu'],
            ['id' => 4, 'type' => 'Wado-ryu'],
            ['id' => 5, 'type' => 'Shorin-ryu'],
            ['id' => 6, 'type' => 'Uechi-ryu'],
            ['id' => 7, 'type' => 'Kyokushin'],
            ['id' => 8, 'type' => 'Budokan'],
            ['id' => 9, 'type' => 'Shorinji']
        ]);
    }
}
