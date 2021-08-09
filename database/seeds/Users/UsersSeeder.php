<?php

use Illuminate\Database\Seeder;

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
    }
}
