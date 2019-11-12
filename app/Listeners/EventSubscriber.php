<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;
class EventSubscriber
{
    /**
     * Handle user login events.
     */
    public function sendEmailNotification($event) {
        // get logged in username
        $email = $event->user->email;
        $username = $event->user->name;
         
        // send email notification about login...
    }
    
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\EventSubscriber@sendEmailNotification'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\EventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\EventSubscriber@onUserLogout'
        );
    }

    public function onUserLogin()
    {
        $user=response()->json(auth()->user());
        Log::info('onUserLogin'.$user);
        session('current_user',auth()->user());
    }

    public function onUserLogout()
    {
        Log::info('onUserLogout');
        session()->forget('current_user');
        session()->flush();
    }
}