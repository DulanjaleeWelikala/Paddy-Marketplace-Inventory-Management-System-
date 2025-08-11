<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewAdminOrderNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🛒 New Order from Admin')
            ->line('An admin has placed a new order for paddy.')
            ->action('View Orders', url('/stock/orders'));
    }
}
