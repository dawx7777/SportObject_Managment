<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationUser extends Mailable
{
    use Queueable, SerializesModels;
    public $postreserv;
    public $object;
    public $email_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postreserv,$object,$email_user)
    {
        $this->postreserv=$postreserv;
        $this->object=$object;
        $this->email_user=$email_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.emailUser');
    }
}
