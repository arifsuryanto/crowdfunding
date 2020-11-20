<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\GenerateOtpEvent;
use App\Mail\GenerateOtpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailGenerateOtp implements ShouldQueue
{

    public function __construct()
    {
        //
    }

    public function handle(GenerateOtpEvent $event)
    {
        Mail::to($event->user)->send(new GenerateOtpMail($event->user));
    }
}
