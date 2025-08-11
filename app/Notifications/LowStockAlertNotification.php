<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Paddy;

class LowStockAlertNotification extends Notification
{
    use Queueable;

    public $paddy;

    /**
     * Create a new notification instance.
     */
    public function __construct(Paddy $paddy)
    {
        $this->paddy = $paddy;
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
            ->subject('⚠️ Low Stock Alert')
            ->line('Stock is running low for the following paddy variety:')
            ->line('👉 Product Name: ' . $this->paddy->product_name)
            ->line('📦 Remaining Stock: ' . $this->paddy->available_quantity . ' kg')
            ->action('View Stock', url('/stock_manager/stock'))
            ->line('Please consider restocking this item.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'paddy_id' => $this->paddy->id,
            'product_name' => $this->paddy->product_name,
            'available_quantity' => $this->paddy->available_quantity,
        ];
    }
}
