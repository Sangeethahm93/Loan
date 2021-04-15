<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id'   => 1,
                'name' => 'Processing',
            ],
            [
                'id'   => 2,
                'name' => 'Analyst one processing',
            ],
            [
                'id'   => 3,
                'name' => 'Analyst one approved',
            ],
            [
                'id'   => 4,
                'name' => 'Analyst one rejected',
            ],
            [
                'id'   => 5,
                'name' => 'Analyst two processing',
            ],
            [
                'id'   => 6,
                'name' => 'Analyst two approved',
            ],
            [
                'id'   => 7,
                'name' => 'Analyst two rejected',
            ],
            [
                'id'   => 8,
                'name' => 'Approved',
            ],
            [
                'id'   => 9,
                'name' => 'Rejected',
            ],
        ];

        Status::insert($statuses);
    }
}
