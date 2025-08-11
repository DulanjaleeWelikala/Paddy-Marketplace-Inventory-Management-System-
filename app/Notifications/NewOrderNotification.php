<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];  // or add 'broadcast' if real-time
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
                    ->subject('New Paddy Order Received')
                    ->line('You have received a new order for your paddy: ' . $this->order->paddy->product_name)
                    ->line('Quantity: ' . $this->order->quantity . ' kg')
                    ->line('Payment Method: ' . $this->order->payment_method)
                    ->action('View Order', url('/farmer/orders/'.$this->order->id))
                    ->line('Please review and accept or reject the order.');
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'paddy_name' => $this->order->paddy->product_name,
            'quantity' => $this->order->quantity,
            'message' => 'You have a new order to review.',
        ];
    }
}
