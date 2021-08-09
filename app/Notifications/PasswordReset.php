<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordReset extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
 * Build the mail representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return \Illuminate\Notifications\Messages\MailMessage
 */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('info@vsc.com', 'ВСО')
            ->level('success')
            ->greeting('Здравейте,')
            ->subject('Промяна на парола')
            ->line('Получавате това писмо, защото има заявка за промяна на парола.') // Here are the lines you can safely override
            ->action('Нова парола', url('password/reset', $this->token))
            ->line('Ако смятате че това е грешка, няма нужда да предприемате действия!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
