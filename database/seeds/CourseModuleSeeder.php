<?php

use App\Models\CourseModules\Module;
use Illuminate\Database\Seeder;

class CourseModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::insert([
            [
                'course_id' => 1,
                'name' => 'Въведение',
                'description' => 'Въведение в програмирането. Що е програмиране?',
                'starts' => Carbon\Carbon::now()->subMonths(3),
                'ends' => Carbon\Carbon::now()->subMonths(3)->addDays(3),
                'visibility' => 'public',
            ],
            [
                'course_id' => 1,
                'name' => 'Модул 2',
                'description' => 'Модул 2',
                'starts' => Carbon\Carbon::now()->subMonths(3)->addDays(3),
                'ends' => Carbon\Carbon::now()->subMonths(3)->addDays(6),
                'visibility' => 'public',
            ],
        ]);
    }
}
