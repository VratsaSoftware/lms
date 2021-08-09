<?php

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
        $this->call(UserRoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserOccupationSeeder::class);
        $this->call(UserSocialSeeder::class);
        $this->call(UserEducationTypeSeeder::class);
        $this->call(UserInterestsTypeSeeder::class);
        $this->call(ShirtSizeSeeder::class);
        $this->call(UsersTeamRoleSeeder::class);
        $this->call(TrainingTypeSeeder::class);
    }
}
