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

    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $course = $this->course;
        $text = '
        Формата ви за кандидатстване за направление ' . $course . ' е успешно изпратена!

        Ако имате въпроси или затруднения се свържете с нас:
         тел.: '. config('consts.PHONE') . '

         ел.поща: ' . config('consts.MAIL_FROM');

        return $this->from(config('consts.MAIL_FROM'))
            ->markdown('user.mails.courseApplicationCreated', compact('text'));
    }
}
