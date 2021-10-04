<?php

use App\Models\CourseModules\Lection;
use Illuminate\Database\Seeder;

class CourseModuleLectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lection::insert([
            [
                'course_modules_id' => 1,
                'title' => 'Лекция 1',
                'description' => 'Лекция 1',
                'visibility' => 'public',
                'first_date' => Carbon\Carbon::now()->subMonths(3),
                'second_date' => Carbon\Carbon::now()->subMonths(3)->addDays(3),
            ],
            [
                'course_modules_id' => 1,
                'title' => 'Лекция 2',
                'description' => 'Лекция 2',
                'visibility' => 'public',
                'first_date' => Carbon\Carbon::now()->subMonths(3)->addDays(3),
                'second_date' => Carbon\Carbon::now()->subMonths(3)->addDays(6),
            ],
        ]);
    }
}
