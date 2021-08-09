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
        Формата ви за кандидатстване за направление '.$course.' е успешно изпратена !

        Това беше първата стъпка, в кандидатстване, следващата е Тест.
        Очаквайте e-mail с дати за входящ тест.
        Прогреса може да следите след като влезете в профила си, и изберете от менюто в ляво Кандидатстване.

        Бутона води към страницата с прогрес, но е нужно да влезете с акаунта си
        (той е направен автоматично, ако не сте били регистрирани при попълване на формата с e-mail с който кандидаствате)

        Ако имате въпроси или затруднения се свържете с нас :
         тел.: +359 88 207 6174

         ел.поща: school@vratsasoftware.com
            ';
        return $this->from('info@vratsasoftware.com')
            ->markdown('user.mails.courseApplicationCreated', compact('text'));
    }
}
