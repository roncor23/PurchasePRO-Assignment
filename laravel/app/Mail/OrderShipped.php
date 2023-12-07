<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $userEmail;
    public $ordersData;

    public function __construct($userEmail, $ordersData)
    {
        $this->userEmail = $userEmail;
        $this->ordersData = $ordersData;
    }

    public function build()
    {
        return $this->view('emails.orders.shipped');
    }
}
