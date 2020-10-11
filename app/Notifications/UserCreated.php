<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * UserCreated
 */
class UserCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appName = config('app.name');

        $url = route('password.reset', $this->token);
        $password = 'secret'; //Crypt::decrypt($notifiable->password); //

        return (new MailMessage)
                    ->subject("Sua conta no sistema $appName foi criada")
                    ->greeting("Olá {$notifiable->name}, seja bem-vindo ao $appName")
                    ->line("Seu número de matricula é: {$notifiable->enrolment}")
                    ->line("Sua senha temporária é: {$password}")
                    ->action("clique aqui para definir sua senha", $url) 
                    ->line('Obrigado por usar nossa aplicação!')
                    ->salutation("Atenciosamente, $appName ")
                    ->bcc('slztelecom@hotmail.com', 'Visita Técnica');;
                    
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
