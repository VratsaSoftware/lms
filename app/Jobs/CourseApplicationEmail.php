<?php

namespace App\Jobs;

use App\Mail\CourseApplicationCreated;
use App\Models\Courses\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class CourseApplicationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $emailTo;
    private $course;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailTo, $course)
    {
        $this->emailTo = $emailTo;
        $this->course = $course;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->emailTo)->send(new CourseApplicationCreated($this->course));
    }
}
