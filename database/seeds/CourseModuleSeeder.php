<?php

use App\Models\CourseModules\Module;
use App\Models\Courses\Course;
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
        $courses = Course::all();

        foreach ($courses as $course) {
            Module::insert([
                [
                    'course_id' => $course->id,
                    'name' => 'Въведение',
                    'description' => 'Въведение в програмирането. Що е програмиране?',
                    'starts' => $course->starts,
                    'ends' => Carbon\Carbon::parse($course->starts)->addDays(3),
                    'visibility' => 'public',
                ],
                [
                    'course_id' => $course->id,
                    'name' => 'Модул 2',
                    'description' => 'Модул 2',
                    'starts' => Carbon\Carbon::parse($course->starts)->addDays(3),
                    'ends' => Carbon\Carbon::parse($course->starts)->addDays(6),
                    'visibility' => 'public',
                ],
            ]);
        }
    }
}
