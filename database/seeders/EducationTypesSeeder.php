<?php

namespace Database\Seeders;

use App\Models\EducationType;
use Illuminate\Database\Seeder;

class EducationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationTypes = [
            [
                'id'   => 1,
                'name' => 'Post Graduate',
            ],
            [
                'id'   => 2,
                'name' => 'Graduate',
            ],
            [
                'id'   => 3,
                'name' => 'Under Graduate',
            ],
            [
                'id'   => 4,
                'name' => 'Other',
            ],
        ];

        EducationType::insert($educationTypes);
    }
}
