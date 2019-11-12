<?php

namespace App\Listeners;

use App\Events\UserLogOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UserLogOutNotification
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
     * @param  UserLogOut  $event
     * @return void
     */
    public function handle(UserLogOut $event)
    {
        Log::info('logout event');
        Log::info(response()->json($event));
    }
}
