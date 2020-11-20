<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use App\Mail\RegisterUserMail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailRegisterUser implements ShouldQueue
{

    public function __construct()
    {
        //
    }

    public function handle(RegisterUserEvent $event)
    {
        Mail::to($event->user)->send(new RegisterUserMail($event->user));
    }
}
