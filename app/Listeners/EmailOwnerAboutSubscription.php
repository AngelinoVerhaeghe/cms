<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOwnerAboutSubscription
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        //? Expecthing a event, this is our UserSubscribed event

        //? Save email in database
            DB::table('newsletters')->insert([
                'email' => $event->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        //? Send User a confirmation that they has been subscribed
        //? In the send() mailable that we have created, usersubscribedmessage
            Mail::to($event->email)->send(new UserSubscribedMessage());

    }
}
