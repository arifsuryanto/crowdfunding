<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class GenerateOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('Arifsuryanto07@gmail.com')
            ->view('mail/show_otp')
            ->with([
                'otp_code' => $this->user->otp_codes->otp,
                'valid_until' => $this->user->otp_codes->valid_until,
            ]);
    }
}
