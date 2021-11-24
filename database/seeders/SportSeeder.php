<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            ['id' => 1, 'sport' => 'Futebol'],
            ['id' => 2, 'sport' => 'Karaté'],
            ['id' => 3, 'sport' => 'Ténis']
        ]);
    }
}
