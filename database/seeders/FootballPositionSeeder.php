<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FootballPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('football_positions')->insert([
            ['id' => 1, 'position' => 'Guarda-Redes'],
            ['id' => 2, 'position' => 'Central'],
            ['id' => 3, 'position' => 'Lateral direito'],
            ['id' => 4, 'position' => 'Lateral esquerdo'],
            ['id' => 5, 'position' => 'Líbero'],
            ['id' => 6, 'position' => 'Médio Defensivo'],
            ['id' => 7, 'position' => 'Médio Ala'],
            ['id' => 8, 'position' => 'Médio Atacante'],
            ['id' => 9, 'position' => 'Médio Centro'],
            ['id' => 10, 'position' => 'Avançado Lateral'],
            ['id' => 11, 'position' => 'Segundo Avançado'],
            ['id' => 12, 'position' => 'Avançado-centro'],
            ['id' => 13, 'position' => 'Falso 9']
        ]);
    }
}
