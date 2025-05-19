<?php

namespace App\Listeners;

use App\Events\PasswordResetRequested;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmail
{
    public function handle(PasswordResetRequested $event): void
    {
        $resetUrl = url("/reset-password?token={$event->token}&email={$event->email}");

        Mail::raw("Clique no link para redefinir sua senha: {$resetUrl}", function ($message) use ($event) {
            $message->to($event->email)
                    ->subject('Redefinição de senha');
        });
    }
}
