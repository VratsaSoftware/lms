<?php

use Illuminate\Database\Seeder;

class UserSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = ['facebook','linkedin','github','skype','dribbble','behance'];
        foreach ($socials as $key => $social) {
            App\Models\Users\Social::create([
                'name' => $social,
            ]);
        }
    }
}
