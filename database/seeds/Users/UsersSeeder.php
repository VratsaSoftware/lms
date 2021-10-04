<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = App\Models\Users\Role::where('role','admin')->first();
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@vsc.com',
            'last_name' => 'admin',
            'password' => bcrypt('123321'),
            'cl_role_id' => $role->id,
        ]);

        self::otherUsers();
    }

    /* Create other users */
    private static function otherUsers() {
        if (config('app.env') == 'local') {
            $faker = Factory::create();

            $users = [];
            for ($i = 1; $i <= 10; $i++) {
                $users[] = [
                    'name' => $faker->firstNameFemale,
                    'email' => $i > 6 ? 'lecturer' . ($i - 6) . '@test.test' : 'test' . $i . '@test.test',
                    'last_name' => $faker->lastName,
                    'password' => bcrypt('123456789'),
                    'cl_role_id' => $i > 6 ? 3 : 2,
                ];
            }

            App\User::insert($users);
        }
    }
}
