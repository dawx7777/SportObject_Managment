<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationAdminUnAccepted extends Mailable
{
    use Queueable, SerializesModels;
    public $reservationsdestroy;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservationsdestroy)
    {
        $this->reservationsdestroy=$reservationsdestroy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.emailUnAccept');
    }
}
