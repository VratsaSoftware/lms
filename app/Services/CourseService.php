<?php

namespace App\Services;

use App\Models\CourseModules\Module;
use App\Models\Courses\Course;
use Carbon\Carbon;

class CourseService {
    /**
     * @param $request
     */
    public static function storeCourse($request) {
        $newCourse = new Course;

        $newCourse->name = $request->name;
        $newCourse->description = $request->description;
        $newCourse->starts = BaseService::parseDatePickerDate($request->starts);
        $newCourse->ends = BaseService::parseDatePickerDate($request->ends);
        $newCourse->visibility = $request->visibility;
        $newCourse->applications_from = BaseService::parseDatePickerDate($request->applications_from);
        $newCourse->applications_to = BaseService::parseDatePickerDate($request->applications_to);
        $newCourse->training_type = $request->training_type;
        $newCourse->save();

        $newCourse->lecturers()->attach($request->lecturers);

        return self::createFirstModule($newCourse);
    }

    /**
     * @param $course
     */
    private static function createFirstModule($course) {
        $module = new Module;

        $module->name = 'Модул 1 - Автоматично създаден - „Скрит“';
        $module->course_id = $course->id;
        $module->starts = $course->starts;
        $module->ends = Carbon::parse($course->starts)->addMonth();
        $module->description = 'Модул 1 - „Скрит“ - Автоматично създаден при създаване на курс - ' . $course->name . ' - Учениците няма да виждат този модул, докато той не стане „Публичен“';
        $module->visibility = 'private';
        $module->save();

        return $module->id;
    }

    /**
     * @param $course
     * @param $request
     */
    public static function updateCourse($courseId, $request) {
        $course = Course::findOrFail($courseId);

        $course->name = $request->name;
        $course->description = $request->description;
        $course->starts = BaseService::parseDatePickerDate($request->starts);
        $course->ends = BaseService::parseDatePickerDate($request->ends);
        $course->visibility = $request->visibility;
        $course->applications_from = BaseService::parseDatePickerDate($request->applications_from);
        $course->applications_to = BaseService::parseDatePickerDate($request->applications_to);
        $course->training_type = $request->training_type;
        $course->save();

        $course->lecturers()->sync($request->lecturers);
    }
}
