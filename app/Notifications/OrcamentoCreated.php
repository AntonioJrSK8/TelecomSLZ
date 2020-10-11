<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrcamentoCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
 
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

        return (new MailMessage)
            ->subject("Sua solicitação de Orçamento")
            ->greeting("Olá {$this->request->name}, seja bem-vindo ao $appName")
            ->line('Sua solicitação de Orçamento foi registrado com sucesso, ')
            ->line('Nossa equipe, entrará em contato o mais breve possível para mais detalhes.')
            ->line("Nome: {$this->request->name} | Empresa: {$this->request->empresa}")
            ->line("Email: {$this->request->email} | Telefone: {$this->request->telefone}")
            ->line("Quantidade de Ramais: {$this->request->NRamais} ")
            ->line("Informações: {$this->request->informacoes} ")
            ->line('Obrigado por usar nossa aplicação!')
            ->line('Atenciosamente,')
            ->salutation("$appName")
            ->bcc('slztelecom@hotmail.com','orçamento');
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
