<?php

namespace App\Mail;

use App\Domain\Checkout\Checkout;
use App\Domain\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public Checkout $customer;
    public User $user;
    public function __construct(Checkout $customer, User $user)
    {
        $this->customer = $customer;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.call/admin')->subject('Notification nouveau client');
    }
}
