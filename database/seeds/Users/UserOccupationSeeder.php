<?php

use Illuminate\Database\Seeder;

class UserOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = ['ученик-гимназия','ученик-университет','работещ','безработен','по-часово','друго'];
        foreach ($occupations as $key => $occupation) {
            App\Models\Users\Occupation::create([
                'occupation' => $occupation,
            ]);
        }
    }
}
