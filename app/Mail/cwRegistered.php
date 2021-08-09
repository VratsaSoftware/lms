<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cwRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $link;
    public $webSite;

    public function __construct($link,$webSite)
    {
        $this->link = $link;
        $this->webSite = $webSite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->link;
        $webSite = $this->webSite;
        $text = '
        Благодарим че сте регистрирахте успешно за CodeWeek Враца '.date('Y').' !

        Програмата за 2та дни:

            Събота 19.10:

            9.00-10.00ч Регистрация

            10.00 - 12.00ч Вдъхновяващи лекции I част

            12.00 - 13.00ч Обяд

            13.00 - 16.00ч Вдъхновяващи лекции II част

            Неделя 20.10:
            
            9.00 - 12.00ч Конкурс: представяне на проекти в категории Дигитален маркетинг, Късометражен филм, Програмиране

            13.00 - 16.00ч Конккурс: представяне на проекти в категории Блоково програмиране, Уеб дизайн и Уеб програмиране , Дизайн

            Още за събитието:
            ';
        return $this->from('info@vratsasoftware.com')
            ->markdown('events.mails.cwRegistered', compact('url','text','webSite'));
    }
}
