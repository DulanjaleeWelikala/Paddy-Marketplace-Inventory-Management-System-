<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StockFullNotification extends Notification
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
            ->subject('🚫 Stock Limit Reached')
            ->line('The total available stock in the system has reached the maximum allowed limit of 100,000 kg.')
            ->line('No more paddy orders can be placed until stock is reduced.')
            ->action('Review Stock', url('/stock_manager/stock'))
            ->line('Please take necessary action to manage the stock levels.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'System stock limit (100,000kg) reached.',
        ];
    }
}
