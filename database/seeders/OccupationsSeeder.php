<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = [
            [
                'id'   => 1,
                'name' => 'Salaried',
            ],
            [
                'id'   => 2,
                'name' => 'Self Employeed',
            ],
            [
                'id'   => 3,
                'name' => 'Self Employeed Professional',
            ],
            [
                'id'   => 4,
                'name' => 'Retired',
            ],
            [
                'id'   => 5,
                'name' => 'Housewife',
            ],
            [
                'id'   => 6,
                'name' => 'Student',
            ],
            [
                'id'   => 7,
                'name' => 'Other',
            ],
        ];

        Occupation::insert($occupations);
    }
}
