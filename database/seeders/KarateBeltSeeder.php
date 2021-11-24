<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KarateBeltSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karate_belts')->insert([
            ['id' => 1, 'color' => 'Branco'],
            ['id' => 2, 'color' => 'Amarelo'],
            ['id' => 3, 'color' => 'Vermelho'],
            ['id' => 4, 'color' => 'Laranja'],
            ['id' => 5, 'color' => 'Verde'],
            ['id' => 6, 'color' => 'Roxo'],
            ['id' => 7, 'color' => 'Marrom'],
            ['id' => 8, 'color' => 'Preto']
        ]);
    }
}
