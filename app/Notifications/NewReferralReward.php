<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewReferralReward extends Notification implements ShouldQueue
{
    use Queueable;
    
    public $referred;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $referred)
    {
        $this->referred = $referred;
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
            ->subject('Nouveau filleul 👥')
            ->greeting('Bravo ' . $notifiable->name . ' 🎉')
            ->line('Tu viens de gagner 10 points grâce à ton filleul : ' . $this->referred->name)
            ->line('Continue à parrainer pour gagner encore plus de récompenses !');
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
