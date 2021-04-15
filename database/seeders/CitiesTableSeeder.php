<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'id'   => 1,
                'name' => 'Bengaluru',
                'state_id' => 1
            ],
            [
                'id'   => 2,
                'name' => 'Mysore',
                'state_id' => 1
            ],
            [
                'id'   => 3,
                'name' => 'Trisur',
                'state_id' => 2
            ],
        ];

        City::insert($cities);
    }
}
