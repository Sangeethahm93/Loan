<?php

namespace Database\Seeders;

use App\Models\LoanPurpose;
use Illuminate\Database\Seeder;

class LoanPurposesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loanPurposes = [
            [
                'id'   => 1,
                'name' => 'Education',
            ],
            [
                'id'   => 2,
                'name' => 'Home Renovation',
            ],
            [
                'id'   => 3,
                'name' => 'Marriage',
            ],
            [
                'id'   => 4,
                'name' => 'Business Expansion',
            ],
            [
                'id'   => 5,
                'name' => 'Agriculture/Farming',
            ],
            [
                'id'   => 6,
                'name' => 'Other',
            ],
        ];

        LoanPurpose::insert($loanPurposes);
    }
}
