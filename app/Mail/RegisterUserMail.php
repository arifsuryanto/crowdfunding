<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Arifsuryanto07@gmail.com')
            ->view('mail/show_registered')
            ->with([
                'email' => $this->user->email,
                'otp_code' => $this->user->otp_codes->code,
                'valid_until' => $this->user->otp_codes->valid_until,
            ]);
    }
}
