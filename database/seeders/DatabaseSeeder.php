<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            StatusesTableSeeder::class,
            EducationTypesSeeder::class,
            LoanPurposesSeeder::class,
            OccupationsSeeder::class,
            CitiesTableSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
        ]);
    }
}
