<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourseApplicationCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $course;
    public $passwordResetToken;

    public function __construct($course, $passwordResetToken)
    {
        $this->course = $course;
        $this->passwordResetToken = $passwordResetToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $course = $this->course;

        return $this->from(config('consts.MAIL_FROM'))
            ->subject(env('APP_NAME') . ' - Успешно кандидатствахте за курс: ' . $course)
            ->view('user.mails.courseApplicationCreated')
            ->with([
                'course' => $course,
                'passwordResetToken' => $this->passwordResetToken,
            ]);
    }
}
