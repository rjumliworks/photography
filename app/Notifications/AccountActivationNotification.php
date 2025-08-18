<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountActivationNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $token = app('auth.password.broker')->createToken($notifiable);
        $activationUrl = url(route('activation', [
            'token' => $token, 
            'email' => $notifiable->email, 
            'name' => $this->user->profile->firstname.' '.$this->user->profile->lastname
        ], false));

        return (new MailMessage)
                        ->subject('Activate Your Account')
                        ->greeting('Hello, ' . $this->user->profile->firstname.' '.$this->user->profile->lastname . '!')
                        ->line('You have been added to the system. Please activate your account by setting your password and updating your profile.')
                        ->action('Activate Account', $activationUrl)
                        ->line('If you did not create this account, please ignore this email.');
    }
}
