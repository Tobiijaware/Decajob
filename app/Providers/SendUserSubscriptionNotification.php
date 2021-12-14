<?php

namespace App\Providers;

use App\Mail\MailSubscription;
use Illuminate\Auth\Events\UserSubscribedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserSubscriptionNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSubscribedEvent  $event
     * @return void
     */
    public function handle(UserSubscribedEvent $event)
    {

        Mail::to($event->user)->send(new MailSubscription($event->user));

    }
}
