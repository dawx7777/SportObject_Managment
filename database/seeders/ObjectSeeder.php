<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objects')->insert([
            'name' =>"Orlik Tęgoborze",
            'adress' => 'Tegoborze 77',
            'city' => 'Tęgoborze',
            'state' => 'PL',
            'hours' => '8:00-22:00',
            'latitude' => 28.452763,
            'longitude' => -81.412228,
        ]);
    }
}
