<?php

use Illuminate\Database\Seeder;

class TrainingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Програмиране','Дигитален Маркетинг','Дизайн', 'Друго'];

        foreach ($types as $key => $type) {
            App\Models\Courses\TrainingType::create([
                'type' => $type,
            ]);
        }
    }
}
