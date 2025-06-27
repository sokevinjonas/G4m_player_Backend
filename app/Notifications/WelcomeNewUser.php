<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNewUser extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bienvenue sur la plateforme !')
            ->greeting('Salut ' . $notifiable->name . ' 👋')
            ->line('Merci de t’être inscrit. Nous sommes ravis de t’avoir parmi nous.')
            ->line('Explore les compétitions, gagne des récompenses et amuse-toi !')
            ->line('🎁 **Ton code de parrainage personnel :** ' . $notifiable->referral_code)
            ->line('Partage ce code avec tes amis pour gagner des points bonus !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
