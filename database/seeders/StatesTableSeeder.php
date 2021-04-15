<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [
                'id'   => 1,
                'name' => 'Karnataka',
                'country_id' => 1
            ],
            [
                'id'   => 2,
                'name' => 'Kerala',
                'country_id' => 1
            ],
        ];

        State::insert($states);
    }
}
