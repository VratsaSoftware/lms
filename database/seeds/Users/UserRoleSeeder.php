<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin','user','lecturer'];
        foreach ($roles as $key => $role) {
            App\Models\Users\Role::create([
                'role' => $role,
            ]);
        }
    }
}
