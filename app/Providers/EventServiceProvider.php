<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PasswordResetRequested;
use App\Listeners\SendPasswordResetEmail;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PasswordResetRequested::class => [
            SendPasswordResetEmail::class,
        ],
    ];
}
