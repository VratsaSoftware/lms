<?php

use Illuminate\Database\Seeder;

class UserInterestsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Програмиране','Дизайн','Дигитален Маркетинг','Предприемачеството','Спорт','други'];
        foreach ($types as $key => $type) {
            App\Models\Users\InterestsType::create([
                'type' => $type,
            ]);
        }
    }
}
