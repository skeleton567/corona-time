<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage())
            ->subject(Lang::get(__('email.subject')))
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(
                Lang::get('Confirm Account'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }
}
