<?php

use App\Models\Courses\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            [
                'name' => 'Програмиране 1',
                'description' => 'Програмиране 1',
                'starts' => Carbon\Carbon::now()->subMonths(3),
                'ends' => Carbon\Carbon::now()->addMonths(3),
                'visibility' => 'public',
                'form_active' => 1,
                'applications_from' => Carbon\Carbon::now()->subMonths(3),
                'applications_to' => Carbon\Carbon::now()->subMonths(2),
                'training_type' => 1,
            ],
        ]);
    }
}
