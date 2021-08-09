<?php

use Illuminate\Database\Seeder;

class UserEducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Средно Образование','Професионално Образование','Бакалавър','Магистърска Степен','Докторска степен'];
        foreach ($types as $key => $type) {
            App\Models\Users\EducationType::create([
                'type' => $type,
            ]);
        }
    }
}
