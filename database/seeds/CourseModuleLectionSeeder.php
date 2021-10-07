<?php

use App\Models\CourseModules\ModulesStudent;
use App\Models\CourseModules\Lection;
use App\Models\CourseModules\Module;
use App\User;
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

                self::courseAddUsers($module->id);
            }
        }
    }

    private static function courseAddUsers($moduleId) {
        $userIds = User::where('cl_role_id', config('consts.USER_ROLE_USER'))
            ->get()
            ->pluck('id');

        foreach ($userIds as $userId) {
            $addStudent = new ModulesStudent;
            $addStudent->course_modules_id = $moduleId;
            $addStudent->user_id = $userId;

            $addStudent->save();
        }
    }
}
