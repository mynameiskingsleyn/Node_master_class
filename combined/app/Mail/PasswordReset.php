<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PasswordReset extends Mailable
{
    /**
     * Unique verification token
     *
     * @var string
     */
    public $token;

    /**
     * Create a new message instance.
     * @return void
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('emails.password_reset_token'))
            ->markdown('emails.templates.users.password_reset_token');
    }
}
