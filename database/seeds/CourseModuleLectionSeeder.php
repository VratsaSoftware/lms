<?php

use App\Models\CourseModules\Lection;
use App\Models\CourseModules\Module;
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
        if (config('app.env') == 'local') {
            $modules = Module::all();

            foreach ($modules as $module) {
                Lection::insert([
                    [
                        'course_modules_id' => $module->id,
                        'title' => 'Лекция 1',
                        'description' => 'Лекция 1',
                        'visibility' => 'public',
                        'first_date' => $module->starts,
                        'second_date' => Carbon\Carbon::parse($module->starts)->addDays(3),
                    ],
                    [
                        'course_modules_id' => $module->id,
                        'title' => 'Лекция 2',
                        'description' => 'Лекция 2',
                        'visibility' => 'public',
                        'first_date' => Carbon\Carbon::parse($module->starts)->addDays(3),
                        'second_date' => Carbon\Carbon::parse($module->starts)->addDays(6),
                    ],
                ]);
            }
        }
    }
}
